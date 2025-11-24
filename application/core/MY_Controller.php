<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->isApi()) {
            header('Content-Type: application/json; charset=utf-8');
        }
    }

    protected function json($data, $status = 200)
    {
        return $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    private function isApi()
    {
        return (strpos(uri_string(), 'api/') === 0);
    }
}
