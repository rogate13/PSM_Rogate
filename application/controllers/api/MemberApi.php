<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/services/BalanceService.php';

/**
 * Member API Controller
 *
 * PHPDoc untuk mendukung Intelephense & IntelliSense
 *
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Loader $load
 *
 * @property Member_model $members
 * @property Member_log_model $memberLog
 */
class MemberApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model', 'members');
        $this->load->model('Member_log_model', 'memberLog');
    }

    /**
     * Helper untuk response JSON
     */
    private function response($data, int $status = 200)
    {
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    /* ==========================================================
        GET /api/members → LIST ALL
    =========================================================== */
    public function index()
    {
        $list = $this->members->getAll();
        return $this->response($list);
    }

    /* ==========================================================
        POST /api/members → CREATE MEMBER
    =========================================================== */
    public function create()
    {
        $payload = json_decode($this->input->raw_input_stream, true);

        if (!$payload || empty($payload['full_name'])) {
            return $this->response(['message' => 'full_name is required'], 422);
        }

        // Generate member_code
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

        // Log CREATE
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
        GET /api/members/{id} → DETAIL MEMBER
    =========================================================== */
    public function show($id)
    {
        $data = $this->members->find($id);

        if (!$data) {
            return $this->response(['message' => 'Member not found'], 404);
        }

        return $this->response($data);
    }

    /* ==========================================================
        PUT /api/members/{id} → UPDATE MEMBER
    =========================================================== */
    public function update($id)
    {
        $payload = json_decode($this->input->raw_input_stream, true);
        $existing = $this->members->find($id);

        if (!$existing) {
            return $this->response(['message' => 'Member not found'], 404);
        }

        // Validasi field yg boleh diupdate
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

        // Log UPDATE
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
        DELETE /api/members/{id} → DELETE MEMBER
    =========================================================== */
    public function delete($id)
    {
        $existing = $this->members->find($id);

        if (!$existing) {
            return $this->response(['message' => 'Member not found'], 404);
        }

        // Hapus member
        $this->members->deleteData($id);

        // Log DELETE
        $this->memberLog->createLog([
            'member_id' => $id,
            'action'    => 'DELETE',
            'old_data'  => json_encode($existing),
            'new_data'  => null
        ]);

        return $this->response(['message' => 'Member deleted successfully']);
    }
}
