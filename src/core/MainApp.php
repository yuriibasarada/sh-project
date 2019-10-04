<?php

namespace core;

use shApp\app\AppAbstract;

class MainApp extends AppAbstract
{
    const MAP_DEFAULT = array(
        '/app' => array(
            0 => 'controller\\Product',
            1 => 'api'
        ),
        '/product' => array(
            0 => 'controller\\Product',
            1 => 'page'
        )
    );

}