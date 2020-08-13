<?php


class Event extends Db_object
{
    protected static $db_table = "evenementen";
    protected static $db_table_fields = array('name', 'date', 'uur', 'start_inschrijving', 'stop_inschrijving', 'plaatsid', 'wie', 'aantal_aanwezigen', 'uitleg_event', 'pdf');
    public $id;
    public $name;
    public $date;
    public $uur;
    public $start_inschrijving;
    public $stop_inschrijving;
    public $plaatsid;
    public $wie;
    public $aantal_aanwezigen;
    public $uitleg_event;
    public $pdf;

    public static function find_all_order_by_date(){
        global $database;
        return self::find_this_query ("SELECT * FROM " . self::$db_table . " ORDER BY date ASC");
    }

    public static function find_all_order_by_date_coming(){
        global $database;
        return self::find_this_query ("SELECT * FROM " . self::$db_table . " WHERE date >= DATE(NOW()) ORDER BY date ASC");
    }

    public static function find_all_order_by_date_past(){
        global $database;
        return self::find_this_query ("SELECT * FROM " . self::$db_table . " WHERE date < DATE(NOW())  ORDER BY date DESC");
    }

    public static function last_inserted_id(){
        $eventid = self::find_this_query ("SELECT id FROM " . self::$db_table . " ORDER BY id LIMIT 1");
        return $eventid;
    }

}