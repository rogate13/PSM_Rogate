<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MongoEventLogger
{
    private $col;

    public function __construct()
    {
        $mongo = new MongoClientCI();
        $this->col = $mongo->collection("transaction_events");
    }

    public function log($event_name, array $payload)
    {
        $data = [
            "event"      => $event_name,
            "payload"    => $payload,
            "timestamp"  => new MongoDB\BSON\UTCDateTime()
        ];

        return $this->col->insertOne($data);
    }
}
