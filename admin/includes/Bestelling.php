<?php


class Bestelling extends Db_object
{
    protected static $db_table = "bestellingen";
    protected static $db_table_fields = array('eventtypeeventid', 'aantal', 'userid', 'unitprice','betaling_status','betaling_id');
    public $id;
    public $eventtypeeventid;
    public $aantal;
    public $userid;
    public $unitprice;
    public $betaling_status;
    public $betaling_id;

    public static function find_all_by_user($userid){
        return static::find_this_query ("SELECT * FROM " . static::$db_table . " WHERE userid = " . $userid);
    }

    public static function find_all_by_paymentid($paymentid){
        return static::find_this_query ("SELECT * FROM " . static::$db_table . " WHERE betaling_id = '" . $paymentid . "'");
    }
}