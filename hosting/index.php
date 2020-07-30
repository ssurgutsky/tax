<?php 

include_once 'params.php';

     $canvas_page_access = $canvas_page."/check_access.php";

     $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
            . $app_id . "&redirect_uri=" . urlencode($canvas_page_access);

     $signed_request = $_REQUEST["signed_request"];

     list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

     $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

     if (empty($data["user_id"])) {
            echo("<script> top.location.href='" . $auth_url . "'</script>");
     } else {
            echo("<script> top.location.href='" . $canvas_page_access . "'</script>");
//            echo ("Welcome User: " . $data["user_id"]);
     } 
 ?>