<?php


class EventTypeEvent extends Db_object
{
    protected static $db_table = "eventtypeevent";
    protected static $db_table_fields = array('eventid','typeeventid','prijs');
    public $id;
    public $eventid;
    public $typeeventid;
    public $prijs;
}