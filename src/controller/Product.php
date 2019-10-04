<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.10.2019
 * Time: 9:56
 */

namespace controller;

use core\Controller;

class Product extends Controller
{
    const NAME = 'product';

    public function page() {
        return $this->view->render('Product');
    }

    public function api() {
        return array(
            'product' => $this->model->product(),
            'totalCount' => $this->model->getTotalCount()
        );
    }
}