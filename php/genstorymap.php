<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 29/03/2016
 * Time: 4:24 PM
 * Function: Using story data from DB to generate a XML file
 */
require("dbinfo.php");

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}

    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) die($conn->connect_error);
    $query = "SELECT S.title as stitle, S.content as stext, S.image as simg, S.latitude as slat, S.longtitude as slon, S.postdate as sdate, S.culture as sculture, S.username as uname FROM Story S";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

//    header("Content-type: text/xml; charset=ISO-8859-1");
    header("Content-type: text/xml");
    echo '<markers>';

    // Iterate through the rows, adding XML nodes for each
    foreach ($result as $row) {
    // ADD TO XML DOCUMENT NODE
        echo '<marker ';
        echo 'tit="' . parseToXML(stripslashes($row['stitle'])) . '" ';
        echo 'descp="' . parseToXML(stripslashes($row['stext'])) . '" ';
        echo 'img="' . parseToXML(stripslashes($row['simg'])) . '" ';
        echo 'lat="' . parseToXML(stripslashes($row['slat'])) . '" ';
        echo 'lon="' . parseToXML(stripslashes($row['slon'])) . '" ';
        echo 'pdate="' . parseToXML(stripslashes($row['sdate'])) . '" ';
        echo 'cul="' . parseToXML(stripslashes($row['sculture'])) . '" ';
        echo 'user="' . parseToXML(stripslashes($row['uname'])) . '" ';
        echo '/>';
    }

    echo '</markers>';
?>