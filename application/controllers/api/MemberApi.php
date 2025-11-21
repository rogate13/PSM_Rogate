<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/services/BalanceService.php';

/**
 * Member API Controller
 *
 * @property CI_Input        $input
 * @property CI_Output       $output
 * @property CI_Loader       $load
 * @property Member_model    $members
 * @property Member_log_model $memberLog
 * @property RoleLib         $role
 */
class MemberApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Member_model', 'members');
        $this->load->model('Member_log_model', 'memberLog');

        // Load role middleware
        $this->load->library('RoleLib', null, 'role');
    }

    private function response($data, int $status = 200)
    {
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    /* ==========================================================
        GET /api/members
    =========================================================== */
    public function index()
    {
        $this->role->require(['ADMIN', 'STAFF']);

        $list = $this->members->getAll();
        return $this->response($list);
    }

    /* ==========================================================
        POST /api/members
    =========================================================== */
    public function create()
    {
        $this->role->require('ADMIN');

        $payload = json_decode($this->input->raw_input_stream, true);

        if (!$payload || empty($payload['full_name'])) {
            return $this->response(['message' => 'full_name is required'], 422);
        }

        // Generate member code
        $code = 'MBR' . time();

        $data = [
            'member_code'     => $code,
            'full_name'       => $payload['full_name'],
            'email'           => $payload['email'] ?? null,
            'phone'           => $payload['phone'] ?? null,
            'status'          => 'ACTIVE',
            'current_balance' => 0
        ];

        $id = $this->members->create($data);
        $newRecord = $this->members->find($id);

        // Log
        $this->memberLog->createLog([
            'member_id' => $id,
            'action'    => 'CREATE',
            'old_data'  => null,
            'new_data'  => json_encode($newRecord)
        ]);

        return $this->response([
            'message' => 'Member created successfully',
            'member'  => $newRecord
        ]);
    }

    /* ==========================================================
        GET /api/members/{id}
    =========================================================== */
    public function show($id)
    {
        $this->role->require(['ADMIN', 'STAFF']);

        $data = $this->members->find($id);

        if (!$data) {
            return $this->response(['message' => 'Member not found'], 404);
        }

        return $this->response($data);
    }

    /* ==========================================================
        PUT /api/members/{id}
    =========================================================== */
    public function update($id)
    {
        $this->role->require('ADMIN');

        $payload = json_decode($this->input->raw_input_stream, true);
        $existing = $this->members->find($id);

        if (!$existing) {
            return $this->response(['message' => 'Member not found'], 404);
        }

        $updateData = [];

        if (isset($payload['full_name'])) $updateData['full_name'] = $payload['full_name'];
        if (isset($payload['email']))     $updateData['email']     = $payload['email'];
        if (isset($payload['phone']))     $updateData['phone']     = $payload['phone'];
        if (isset($payload['status']))    $updateData['status']    = $payload['status'];

        if (empty($updateData)) {
            return $this->response(['message' => 'No fields to update'], 422);
        }

        $this->members->updateData($id, $updateData);
        $updated = $this->members->find($id);

        $this->memberLog->createLog([
            'member_id' => $id,
            'action'    => 'UPDATE',
            'old_data'  => json_encode($existing),
            'new_data'  => json_encode($updated)
        ]);

        return $this->response([
            'message' => 'Member updated successfully',
            'member'  => $updated
        ]);
    }

    /* ==========================================================
        DELETE /api/members/{id}
    =========================================================== */
    public function delete($id)
    {
        $this->role->require('ADMIN');

        $existing = $this->members->find($id);

        if (!$existing) {
            return $this->response(['message' => 'Member not found'], 404);
        }

        $this->members->deleteData($id);

        $this->memberLog->createLog([
            'member_id' => $id,
            'action'    => 'DELETE',
            'old_data'  => json_encode($existing),
            'new_data'  => null
        ]);

        return $this->response(['message' => 'Member deleted successfully']);
    }
}
