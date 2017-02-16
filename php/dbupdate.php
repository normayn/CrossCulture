<?php
/**
 * Created by PhpStorm.
 * User: nerminyildiz
 * Date: 21.04.2016
 * Time: PM 11:25
 * Function: to retrieve the cultural event and insert into database
 * use daily to update the database
 */
require "eventDB.php";
getEventInfo("Chinese OR China");

getEventInfo("Italian OR Italy");


getEventInfo("Indian OR India");


getEventInfo("Greek OR Greece");


getEventInfo("Turkish OR Turkey");

?>