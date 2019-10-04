<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.10.2019
 * Time: 10:12
 */

namespace model;


use core\Model;

class Product extends Model
{
    private $limit = 10;
    private $offset = 0;

    const NAME = 'product';

    public function product()
    {
        extract($this->getOffset());
        if(!$limit && !$offset) {
            $limit = $this->limit;
            $offset = $this->offset;
        }
        $query = "SELECT * FROM product 
                  LIMIT $limit OFFSET $offset";
        return $this->query($query)->fetchAssocAll();
    }

}