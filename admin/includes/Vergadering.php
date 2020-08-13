<?php


class Vergadering extends Db_object
{
    protected static $db_table = "vergaderingen";
    protected static $db_table_fields = array('name', 'date', 'plaatsid', 'verslag');
    public $id;
    public $name;
    public $date;
    public $plaatsid;
    public $verslag;


}