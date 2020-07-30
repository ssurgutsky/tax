<?php

//$myFile = "testFile.txt";
//$fh = fopen($myFile, 'w+') or die("can't open file");

include_once 'utils.php';
include_once 'params.php';

$current_url = current_url();
//fwrite($fh, "test" . $current_url);

// Validate request is from Facebook and parse contents for use.
$request = parse_signed_request($_POST['signed_request'], $app_secret);

// Get request type.
// Two types:
//   1. payments_get_items.
//   2. payments_status_update.
$request_type = $_POST['method'];

// Setup response.
$response = '';

if ($request_type == 'payments_get_items') {
  // Get order info from Pay Dialog's order_info.
  // Assumes order_info is a JSON encoded string.
  $order_info = json_decode($request['credits']['order_info'], true);

  // Get item id.
  $item_id = $order_info['item_id'];

  // Simulutates item lookup based on Pay Dialog's order_info.
  if ($item_id == 'thank_you') {
    $item = array(
      'title' => 'Thank you!',
      'description' => iconv("windows-1251", "utf-8", "Сказать спасибо за игру"),
      'price' => 1,
      'image_url' => $current_url.'/cool.png',
    );
  }

  // Simulutates item lookup based on Pay Dialog's order_info.
  if ($item_id == 'money') {
    $item = array(
      'title' => '10,000',
      'description' => iconv("windows-1251", "utf-8", "Купить 10,000 игровых денег"),
      'price' => 1,
      'image_url' => $current_url.'/money.png',
    );
  }

  if ($item_id == 'save_game') {
    $item = array(
      'title' => 'Save game',
      'description' => iconv("windows-1251", "utf-8", "Сохранить игру"),
      'price' => 1,
      'image_url' => $current_url.'/taxi.png',
    );
  }

    // Construct response.
    $response = array(
                  'content' => array(
                                 0 => $item,
                               ),
                  'method' => $request_type,
                );
    // Response must be JSON encoded.
    $response = json_encode($response);

} else if ($request_type == "payments_status_update") {
  // Get order details.
  $order_details = json_decode($request['credits']['order_details'], true);

  // Determine if this is an earned currency order.
  $item_data = json_decode($order_details['items'][0]['data'], true);
  $earned_currency_order = (isset($item_data['modified'])) ?
                             $item_data['modified'] : null;

  // Get order status.
  $current_order_status = $order_details['status'];

  if ($current_order_status == 'placed') {
    // Fulfill order based on $order_details unless...

    if ($earned_currency_order) {
      // Fulfill order based on the information below...
      // URL to the application's currency webpage.
      $product = $earned_currency_order['product'];
      // Title of the application currency webpage.
      $product_title = $earned_currency_order['product_title'];
      // Amount of application currency to deposit.
      $product_amount = $earned_currency_order['product_amount'];
      // If the order is settled, the developer will receive this
      // amount of credits as payment.
      $credits_amount = $earned_currency_order['credits_amount'];
    }

    $next_order_status = 'settled';

    // Construct response.
    $response = array(
                  'content' => array(
                                 'status' => $next_order_status,
                                 'order_id' => $order_details['order_id'],
                               ),
                  'method' => $request_type,
                );
    // Response must be JSON encoded.
    $response = json_encode($response);

  } else if ($current_order_status == 'disputed') {
    // 1. Track disputed item orders.
    // 2. Investigate user's dispute and resolve by settling or refunding the order.
    // 3. Update the order status asychronously using Graph API.

  } else if ($current_order_status == 'refunded') {
    // Track refunded item orders initiated by Facebook. No need to respond.

  } else {
    // Track other order statuses.

  }
}

// Send response.
echo $response;

//  fwrite($fh, json_encode($order_info) . "\n");
//  fwrite($fh, $item_id . "\n");
//  fwrite($fh, $response);
  
//  fclose($fh);





// These methods are documented here:
// https://developers.facebook.com/docs/authentication/signed_request/
function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2);

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
  return base64_decode(strtr($input, '-_', '+/'));
}
?>