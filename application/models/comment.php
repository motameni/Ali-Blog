<?php
/**
 * Created by PhpStorm.
 * User: Ali Motameni
 * Date: 3/23/14
 * Time: 7:17 PM
 */
class Comment extends MY_Model{

    const DB_TABLE = 'comment';
    const DB_TABLE_PK = 'id';
    /**
     * comment id.
     * @int(9)
     */
    public $id;

    /**
     * comment writer name.
     * @varchar(50)
     */
    public $name;

    /**
     * comment writer email address.
     * @varchar(70)
     */
    public $email;

    /**
     * comment writer phone number.
     * @varchar(25)
     */
    public $phone;

    /**
     * comment text.
     * @text
     */
    public $text;

    /**
     * post id.
     * @int(6)
     */
    public $postId;

    /**
     * Show comment permission.
     * @boolean
     */
    public $show;
}