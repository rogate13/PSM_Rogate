<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/services/BalanceService.php';

class TransactionApi extends CI_Controller
{

    private $balanceService;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model', 'transactions');
        $this->load->model('Member_model', 'members');
        $this->balanceService = new BalanceService();
    }

    // GET /api/members/{id}/transactions
    public function index($member_id)
    {
        $list = $this->transactions->getByMember($member_id);

        return $this->output->set_content_type('application/json')
            ->set_output(json_encode($list));
    }

    // POST /api/members/{id}/deduct
    public function deduct($id)
    {
        $payload = json_decode($this->input->raw_input_stream, true);
        $amount = (int)$payload['amount'];

        try {
            $newBalance = $this->balanceService->deduct($id, $amount);
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode([
                    'message' => 'Deduct success',
                    'new_balance' => $newBalance
                ]));
        } catch (Exception $e) {
            return $this->output->set_status_header(400)
                ->set_output(json_encode(['message' => $e->getMessage()]));
        }
    }
}
