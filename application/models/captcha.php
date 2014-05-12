<?php
/**
 * Created by PhpStorm.
 * User: Ali Motameni
 * Date: 4/18/14
 * Time: 5:56 PM
 */
class Post extends MY_Model{

    const DB_TABLE = 'captcha';
    const DB_TABLE_PK = 'captcha_id';
    /**
     * captcha Id
     * @big int(13)
     */
    public $captcha_id;

    /**
     * captcha time
     * @int(10)
     */
    public $captcha_time;

    /**
     * IP Address
     * @varchar(16)
     */
    public $ip_address;

    /**
     * word
     * @varchar(20)
     */
    public $word;

}