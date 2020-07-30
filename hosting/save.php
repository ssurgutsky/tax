<?php

//$myFile = "testFile.txt";
//$fh = fopen($myFile, 'w+') or die("can't open file");

//fwrite($fh, $_REQUEST[fsc].", ".$_REQUEST[mark]);

include_once 'utils.php';

mysql_connect($host, $login, $pass) or
    die("mysql_error: " . mysql_error());

mysql_select_db($db) or
    die("mysql_error: " . mysql_error());

$sql = "insert into TAX_USERS (FBID, FREE_SAVE_COUNT, VAR_STR, MARK) values ('$_REQUEST[fbid]', '$_REQUEST[fsc]', '$_REQUEST[varstr]', '$_REQUEST[mark]') on duplicate key update FREE_SAVE_COUNT='$_REQUEST[fsc]', VAR_STR='$_REQUEST[varstr]', MARK='$_REQUEST[mark]'";

mysql_query($sql) or  //fwrite($fh, mysql_error()) or
  die('mysql_error: ' . mysql_error()."<br>in statement: ".$sql);

//fclose($fh);


?>
