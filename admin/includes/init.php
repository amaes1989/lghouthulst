<?php
/*
defined ('DS') ? null : define ('DS', DIRECTORY_SEPARATOR);
define ('SITE_ROOT', DS . 'xampp' . DS . 'htdocs' . DS . 'webshop');
defined ('INCLUDES_PATH') ? null : define ('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');
defined('IMAGES_PATH') ? null : define ('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'img');*/

#for production (online)
defined ('DS') ? null : define ('DS', DIRECTORY_SEPARATOR);
define ('SITE_ROOT', DS . 'var' . DS . 'www' . DS . 'html' . DS . 'lghouthulst');
defined ('INCLUDES_PATH') ? null : define ('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');
defined('IMAGES_PATH') ? null : define ('IMAGES_PATH', SITE_ROOT.DS.'admin'.DS.'img');
/**
 * deze pagina zal alle includes bevatten
 */
require_once(INCLUDES_PATH.DS."Session.php");
/*php pagina's*/
require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."config.php");
/*objecten*/
require_once(INCLUDES_PATH.DS."Database.php");
require_once (INCLUDES_PATH.DS."Db_object.php");
require_once(INCLUDES_PATH.DS."User.php");
require_once(INCLUDES_PATH.DS."Vergadering.php");
require_once(INCLUDES_PATH.DS."Voordeellid.php");
require_once(INCLUDES_PATH.DS."Soortvoordeel.php");
require_once(INCLUDES_PATH.DS."Event.php");
require_once(INCLUDES_PATH.DS."Image.php");
require_once(INCLUDES_PATH.DS."Bericht.php");
require_once(INCLUDES_PATH.DS."Plaats.php");
require_once(INCLUDES_PATH.DS."Bestelling.php");
require_once(INCLUDES_PATH.DS."Typeevent.php");
require_once(INCLUDES_PATH.DS."EventTypeEvent.php");


$mollie_api_key = 'test_G6uTwNPnAFdKw8sh2wsR57kDHBfWqG';
/*locatie naar de images map en includes map vastleggen*/

?>