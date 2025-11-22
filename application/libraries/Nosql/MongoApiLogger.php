<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MongoApiLogger
{
    private $col;

    public function __construct()
    {
        $mongo = new MongoClientCI();
        $this->col = $mongo->collection("api_logs");
    }

    public function log($endpoint, $method, $status, $body)
    {
        $log = [
            "endpoint"     => $endpoint,
            "method"       => $method,
            "status"       => $status,
            "body"         => $body,
            "timestamp"    => new MongoDB\BSON\UTCDateTime()
        ];

        $this->col->insertOne($log);
    }
}
