<?php


class Typeevent extends Db_object
{
    protected static $db_table = "typeevent";
    protected static $db_table_fields = array('type');
    public $id;
    public $type;

}