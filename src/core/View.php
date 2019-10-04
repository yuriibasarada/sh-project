<?php

namespace core;

use shApp\map\MapConfigInterface as MapConfig;
use shApp\map\MapExtAbstract;

class View extends MapExtAbstract
{
    protected $path;
    protected $layout = 'default';

    public function __construct(MapConfig $config)
    {
        parent::__construct($config);
        $this->path = $this->request->getPath();
    }

    public function render($title, $vars = [])
    {
        $vars['style'] = $this->getStyle();
        $vars['script'] = $this->getScript();
        extract($vars);
        $path = realpath(DIR_VIEW) . $this->path . '.php';
        if (!file_exists($path)) {
            $path = realpath(DIR_VIEW) . $this->path . '/index' . '.php';
        }
        if (file_exists($path)) {
            ob_start();
            require_once $path;
            $content = ob_get_clean();;
            $path = realpath(DIR_VIEW) . '/layouts/' . $this->layout . '.php';
            require_once $path;
        }
    }

    private function getStyle()
    {
        $path = realpath(DIR_REQUIRE_STYLE) . $this->path . '.ini';
        $arr = parse_ini_file($path);
        foreach ($arr as $key => $val) {
            $arr[$key] = '<link rel="stylesheet" href=' . $val . '>';
        }
        return implode($arr);
    }

    private function getScript()
    {
        $path = realpath(DIR_REQUIRE_SCRIPT) . $this->path . '.ini';
        $arr = parse_ini_file($path);
        foreach ($arr as $key => $val) {
            $arr[$key] = '<script src=' . $val . '></script>';
        }
        return implode($arr);
    }
}