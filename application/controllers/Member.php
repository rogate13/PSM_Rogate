<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
class Member extends CI_Controller
{
    public function index()
    {
        // Halaman daftar member (opsional)
        $this->load->view('member/index');
    }

    public function detail($id)
    {
        $this->load->model('Member_model', 'members');
        $member = $this->members->find($id);

        $this->load->view('member/detail', compact('member'));
    }
}
