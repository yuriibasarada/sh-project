<?php

namespace core;

use shApp\map\MapConfigInterface as MapConfig;
use shApp\map\MapExtAbstract;

abstract class Model extends MapExtAbstract
{
    const NAME = 'model';

    public function __construct(MapConfig $config)
    {
        parent::__construct($config);
    }

    public function getTotalCount()
    {
        $table = static::NAME;
        $table_id = $table . '_id';
        $query = "SELECT COUNT($table_id) FROM $table ";
        return $this->query($query)->fetchColumn();
    }

    public function getOffset()
    {
        $data = $this->getDataJson();

        $off = 0;
        for ($i = 1; $i < $data['page']; $i++) {
            $off += $data['limit'];
        }
        return array(
            'limit' => $data['limit'],
            'offset' => $off
        );
    }

    public function getDataJson()
    {
        return json_decode($this->getData(), true);
    }
}