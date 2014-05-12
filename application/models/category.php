<?php
/**
 * Created by PhpStorm.
 * User: Ali Motameni
 * Date: 3/23/14
 * Time: 7:17 PM
 */
class Category extends MY_Model{

    const DB_TABLE = 'category';
    const DB_TABLE_PK = 'id';

    /**
     * @var int(6) category id.
     */
    public $id;

    /**
     * @var VARCHAR(100) category label.
     */
    public $label;
}