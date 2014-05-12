<?php
/**
 * Created by PhpStorm.
 * User: Ali Motameni
 * Date: 3/23/14
 * Time: 6:29 PM
 */
class Post extends MY_Model{

    const DB_TABLE = 'post';
    const DB_TABLE_PK = 'id';
    /**
     * post id.
     * @int(6)
     */
    public $id;

    /**
     * post title.
     * @varchar(1000)
     */
    public $title;

    /**
     * post content.
     * @text
     */
    public $text;

    /**
     * post Date
     * @date
     */
    public $date;

    /**
     * number of visited post
     * @int(10)
     */
    public $view;

    /**
     * @var int(6) category id.
     */
    public $category;

    /**
     * @var boolean visible
     */
    public $visible;
}
