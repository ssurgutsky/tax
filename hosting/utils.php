<?php


$host = "mysql56.1gb.ru";
$db = "gb_x_creofilm";
$login = "gb_x_creofilm";
$pass = "5c87c0fa812";


function current_url()
{
  $result = ''; // ���� ��������� ����
  $default_port = 80; // ���� ��-���������
 
  // � �� � ����������-�� �� ����������?
  if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
    // � ����������! ������� ��������...
    $result .= 'https://';
    // ...� ������������ �������� ����� ��-���������
    $default_port = 443;
  } else {
    // ������� ����������, ������� ��������
    $result .= 'http://';
  }
  // ��� �������, ����. site.com ��� www.site.com
  $result .= $_SERVER['SERVER_NAME'];
 
  // � ���� � ��� ��-���������?
  if ($_SERVER['SERVER_PORT'] != $default_port) {
    // ���� ���, �� ������� ���� � URL
    $result .= ':'.$_SERVER['SERVER_PORT'];
  }
  // ��������� ����� ������� (���� � GET-���������).
  //$result .= $_SERVER['REQUEST_URI'];
  // ���, ����� ����������!
  return $result;
}

?>