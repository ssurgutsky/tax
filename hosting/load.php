<?php

//$myFile = "testFile.txt";
//$fh = fopen($myFile, 'w+') or die("can't open file");

include_once 'utils.php';

mysql_connect($host, $login, $pass) or
    die("mysql_error: " . mysql_error());

mysql_select_db($db) or
    die("mysql_error: " . mysql_error());

$sql = "select FREE_SAVE_COUNT, MARK, VAR_STR from TAX_USERS where FBID='$_REQUEST[fbid]'";
$result = mysql_query($sql) or
    die("mysql_error: " . mysql_error());

$row = mysql_fetch_array($result);

//fwrite($fh, urlencode($row[2]));

echo "$row[0]&&&&$row[1]&&&&$row[2]";

mysql_free_result($result);

//fclose($fh);

?>
