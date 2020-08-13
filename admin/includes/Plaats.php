<?php


class Plaats extends Db_object
{
    protected static $db_table = "plaatsen";
    protected static $db_table_fields = array('name', 'street', 'number', 'zip', 'city', 'phone', 'contactpersoon');
    public $id;
    public $name;
    public $street;
    public $number;
    public $zip;
    public $city;
    public $phone;
    public $contactpersoon;
}