<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use MongoDB\Client;

class MongoClientCI
{
    private $db;

    public function __construct()
    {
        require_once APPPATH . 'third_party/vendor/autoload.php';

        $client = new Client("mongodb://localhost:27017");
        $this->db = $client->selectDatabase("member_app");
    }

    public function collection($name)
    {
        return $this->db->selectCollection($name);
    }
}
