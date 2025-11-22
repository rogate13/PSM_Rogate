<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MongoEventSourcing
{
    private $col;

    public function __construct()
    {
        $mongo = new MongoClientCI();
        $this->col = $mongo->collection("event_sourcing");
    }

    public function record($event_name, array $payload)
    {
        $this->col->insertOne([
            "event"      => $event_name,
            "payload"    => $payload,
            "timestamp"  => new MongoDB\BSON\UTCDateTime()
        ]);
    }
}
