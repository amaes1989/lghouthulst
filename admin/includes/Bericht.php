<?php


class Bericht extends Db_object
{
    protected static $db_table = "berichten";
    protected static $db_table_fields = array('tekst', 'eventid', 'imageid', 'weergeven');
    public $id;
    public $tekst;
    public $eventid;
    public $imageid;
    public $weergeven;

    public static function find_all_order_id_desc(){
        return static::find_this_query ("SELECT * FROM " . static::$db_table . " WHERE weergeven = 1 ORDER BY id DESC");
    }
}