<?php


class Voordeellid extends Db_object
{
    protected static $db_table = "voordeellid";
    protected static $db_table_fields = array('tekst', 'soortvoordeellid', 'weergeven');
    public $id;
    public $tekst;
    public $soortvoordeellid;
    public $weergeven;

    public static function count_all_per_soort($soort){
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " WHERE soortvoordeellid = " . $soort . " AND weergeven = 1";
        $result_set = $database->query ($sql);
        $row = mysqli_fetch_array ($result_set);

        return array_shift ($row);
    }
}