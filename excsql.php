<?php
/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 5/04/2016
 * Time: 11:02 PM
// */
//$vals = array(
//    'db_user'=>'b7ab3654e373f0',
//    'db_pass'=>'732acd95',
//    'db_host'=>'au-cdbr-azure-east-a.cloudapp.net',
//    'db_name'=>'crossculture'
//);
//
//
//$command = "mysql -u{$vals['db_user']} -p{$vals['db_pass']} "
//    . "-h {$vals['db_host']} -D {$vals['db_name']} < {$script_path}";
//
//
//$output = shell_exec($command . 'crossculture.sql');
// Name of the file
$filename = 'crossculture-12.sql';
// MySQL host
$mysql_host = 'au-cdbr-azure-east-a.cloudapp.net';
// MySQL username
$mysql_username = 'b7ab3654e373f0';
// MySQL password
$mysql_password = '732acd95';
// Database name
$mysql_database = 'crossculture';

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

// Add this line to the current segment
    $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
echo "Tables imported successfully";
?>