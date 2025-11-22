<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MongoSnapshotService
{
    private $col;

    public function __construct()
    {
        $mongo = new MongoClientCI();
        $this->col = $mongo->collection("balance_snapshots");
    }

    public function snapshot($member_id, $before, $after)
    {
        $data = [
            "member_id"   => $member_id,
            "date"        => date("Y-m-d"),
            "before"      => $before,
            "after"       => $after,
            "timestamp"   => new MongoDB\BSON\UTCDateTime()
        ];

        return $this->col->insertOne($data);
    }
}
