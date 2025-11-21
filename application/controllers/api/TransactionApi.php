<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/services/BalanceService.php';

/**
 * Transaction API Controller
 *
 * @property CI_Input              $input
 * @property CI_Output             $output
 * @property CI_Loader             $load
 * @property Transaction_model     $transactions
 * @property Member_model          $members
 * @property Transaction_log_model $transactionLog
 * @property RoleLib               $role
 */
class TransactionApi extends CI_Controller
{

    private $balanceService;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Transaction_model', 'transactions');
        $this->load->model('Member_model', 'members');
        $this->load->model('Transaction_log_model', 'transactionLog');

        $this->load->library('RoleLib', null, 'role');

        $this->balanceService = new BalanceService();
    }

    private function response($data, int $status = 200)
    {
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    /* ==========================================================
        POST /api/members/{id}/topup
    =========================================================== */
    public function topup($member_id)
    {
        $this->role->require(['ADMIN', 'STAFF']);

        $payload = json_decode($this->input->raw_input_stream, true);

        if (empty($payload['amount']) || $payload['amount'] <= 0) {
            return $this->response(['message' => 'Invalid amount'], 422);
        }

        try {
            $newBalance = $this->balanceService->topup($member_id, $payload['amount']);

            return $this->response([
                'message' => 'Topup success',
                'new_balance' => $newBalance
            ]);
        } catch (Exception $e) {
            return $this->response(['message' => $e->getMessage()], 400);
        }
    }

    /* ==========================================================
        POST /api/members/{id}/deduct
    =========================================================== */
    public function deduct($member_id)
    {
        $this->role->require(['ADMIN', 'STAFF']);

        $payload = json_decode($this->input->raw_input_stream, true);

        if (empty($payload['amount']) || $payload['amount'] <= 0) {
            return $this->response(['message' => 'Invalid amount'], 422);
        }

        try {
            $newBalance = $this->balanceService->deduct($member_id, $payload['amount']);

            return $this->response([
                'message' => 'Deduct success',
                'new_balance' => $newBalance
            ]);
        } catch (Exception $e) {
            return $this->response(['message' => $e->getMessage()], 400);
        }
    }

    /* ==========================================================
        GET /api/members/{id}/transactions
    =========================================================== */
    public function history($member_id)
    {
        $this->role->require(['ADMIN', 'STAFF']);

        $member = $this->members->find($member_id);

        if (!$member) {
            return $this->response(['message' => 'Member not found'], 404);
        }

        $list = $this->transactions->getByMember($member_id);

        return $this->response([
            'member_id' => $member_id,
            'transactions' => $list
        ]);
    }
}
