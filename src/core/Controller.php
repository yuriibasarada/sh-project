<?php

namespace core;

use shApp\map\MapConfig;
use shApp\map\MapExtAbstract;
use model;

abstract class Controller extends MapExtAbstract
{
    public $model;
    public $view;

    const NAME = 'model';

    public function __construct(MapConfig $config)
    {
        parent::__construct($config);
        $this->model = $this->getModel();
        $this->view = new View($this->config);
    }

    public function getModel() {
        $path =  'model\\' . ucfirst(static::NAME);
        return new $path($this->config);
    }
}