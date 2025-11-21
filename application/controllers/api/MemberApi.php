<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/services/BalanceService.php';

class MemberApi extends CI_Controller
{

    private $balanceService;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model', 'members');
        $this->balanceService = new BalanceService();
    }

    // POST /api/members
    public function create()
    {
        $data = json_decode($this->input->raw_input_stream, true);

        if (!$data || empty($data['full_name'])) {
            return $this->output->set_status_header(422)
                ->set_output(json_encode(['message' => 'full_name is required']));
        }

        $code = 'MBR' . time();

        $id = $this->members->create([
            'member_code'    => $code,
            'full_name'      => $data['full_name'],
            'email'          => $data['email'] ?? null,
            'phone'          => $data['phone'] ?? null,
            'status'         => 'ACTIVE',
            'current_balance' => 0
        ]);

        return $this->output->set_content_type('application/json')
            ->set_output(json_encode($this->members->find($id)));
    }

    // GET /api/members/{id}
    public function show($id)
    {
        $member = $this->members->find($id);

        if (!$member) {
            return $this->output->set_status_header(404)
                ->set_output(json_encode(['message' => 'Member not found']));
        }

        return $this->output->set_content_type('application/json')
            ->set_output(json_encode($member));
    }

    // POST /api/members/{id}/topup
    public function topup($id)
    {
        $payload = json_decode($this->input->raw_input_stream, true);
        $amount = (int)$payload['amount'];

        try {
            $newBalance = $this->balanceService->topup($id, $amount);
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode([
                    'message' => 'Topup success',
                    'new_balance' => $newBalance
                ]));
        } catch (Exception $e) {
            return $this->output->set_status_header(400)
                ->set_output(json_encode(['message' => $e->getMessage()]));
        }
    }
}
