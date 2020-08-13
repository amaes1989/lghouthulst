<?php


class Soortvoordeel extends Db_object
{
    protected static $db_table = "soortvoordeel";
    protected static $db_table_fields = array('name');
    public $id;
    public $name;

}