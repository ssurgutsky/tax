<?

include_once 'params.php';

$error = $_REQUEST['error'];

if ($error != "" ) {
  echo "���� �� ����� ���� �������� ��-�� ������: " . $error. ".<br>";
}


     $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
            . $app_id . "&redirect_uri=" . urlencode($canvas_page);

     $signed_request = $_REQUEST["signed_request"];

     list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

     $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

     if (empty($data["user_id"])) {
            echo "���� �� ����� ���� �������� ��-�� ������� � ������������.<br><a href=".$canvas_page.">���������� ��� ���...</a>";
     } else {
            echo("<script> top.location.href='" . $canvas_page."/game.php" . "'</script>");
     }


?>