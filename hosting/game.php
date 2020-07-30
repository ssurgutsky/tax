<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=wincp-1251" />

		<script type="text/javascript" src="swfobject.js"></script>
		<script type="text/javascript">
			swfobject.registerObject("qatech2_game", "9.0.0");
		</script>


<title>QATech2</title>
</head>
<body bgcolor="#000000">
<div id="game">
<center>
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="640" height="660" id="qatech2_game" name="QATech2" class="QATech2" align="middle">
				<param name="movie" value="QATech2.swf">
				<param name="play" value="true">
				<param name="loop" value="true">
				<param name="menu" value="true">
				<param name="quality" value="high">
				<param name="scale" value="showall">
				<param name="wmode" value="transparent">
				<param name="bgcolor" value="#000000">
				<param name="devicefont" value="false">
				<param name="allowfullscreen" value="false">
				<param name="allowscriptaccess" value="sameDomain">
				<param name="flashvars" value="baseURL=<?php include_once 'utils.php'; echo current_url() ?>">
					<a href="http://www.adobe.com/go/getflashplayer">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
			</object>
</center>




<!-- <embed width="760" height="660" FlashVars="<?php include_once 'utils.php'; echo "baseURL=".current_url() ?> align="middle" type="application/x-shockwave-flash" salign="" allowscriptaccess="sameDomain" allowfullscreen="false" menu="true" name="QATech2" id="QATech2" bgcolor="#000000" devicefont="false" wmode="transparent" scale="showall" loop="true" play="true" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="QATech2.swf"> -->
</div>
<div id="FBBar">
<embed width="760" height="60" FlashVars="ad=Пригласи друга (кнопка INVITE) и получи 1 бесплатное сохранение|Скажи автору спасибо (кнопка THANK YOU!) и получи 3 сохранения|Напиши отзыв (кнопка FEED) и получи 1 бесплатное сохранение|Пополняй свой счет FB кредитами с помощью кнопки ADD|Зарабатывай FB кредиты с помощью кнопки EARN|Присоединяйся к сообществу Taxoman! (кнопка COMUUNITY)" align="middle" type="application/x-shockwave-flash" salign="" allowscriptaccess="sameDomain" allowfullscreen="false" menu="true" name="FBBar" bgcolor="#000000" devicefont="false" wmode="transparent" scale="showall" loop="true" play="true" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="FBBar.swf">
</div>
<hr>
<div id="like">
<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fapps.facebook.com%2Ftaxoman&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
</div>
    <div id="fb-ui-return-data"></div>
    <div id="fb-root"></div>

    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script> 

      FB.init({appId: <?php include_once 'params.php'; echo $app_id ?>, status: true, cookie: true, oauth: true});

      var uid;

      FB.getLoginStatus(function(response) {
      if (response.status === 'connected') {
        // the user is logged in and has authenticated your
        // app, and response.authResponse supplies
        // the user's ID, a valid access token, a signed
        // request, and the time the access token 
        // and signed request each expire
        uid = response.authResponse.userID;
        var accessToken = response.authResponse.accessToken;


        var IE='\v'=='v';

	if(!IE) {
	        document.getElementById("game").innerHTML = '<embed width="760" height="660" FlashVars="<?php include_once 'utils.php'; echo "baseURL=".current_url()."&fbid="?>' + uid + '"align="middle" type="application/x-shockwave-flash" salign="" allowscriptaccess="sameDomain" allowfullscreen="false" menu="true" name="QATech2" id="QATech2" bgcolor="#000000" devicefont="false" wmode="transparent" scale="showall" loop="true" play="true" pluginspage="http://www.macromedia.com/go/getflashplayer" quality="high" src="QATech2.swf">';
	}
                                                                                                                                                                                                                                                                                                                                                
//        alert("UID: " + uid + ", access_token: " + accessToken);
      } else if (response.status === 'not_authorized') {
        // the user is logged in to Facebook, 
        // but has not authenticated your app
        document.getElementById("game").innerHTML = '<center><img src="/poster_unauthorized.jpg"></center>';
        alert("Проблемы с авторизацией. Перезапустите приложение.");

      } else {
        // the user isn't logged in to Facebook.
        document.getElementById("game").innerHTML = '<center><img src="/poster_unauthorized.jpg"></center>';
        alert("Проблемы с логином. Перезапустите приложение.");
      }
     });

      function get_fbid() {
        QATech2.take_fbid(uid);
      }


      function thank_you() {
        var obj = {
          method: 'pay',
          action: 'buy_item',
          order_info: {'item_id': 'thank_you'},
          dev_purchase_params: {'oscif': true}
        };

        FB.ui(obj, js_callback_give_3_free_save);
      }

      function inc_money() {
        var obj = {
          method: 'pay',
          action: 'buy_item',
          order_info: {'item_id': 'money'},
          dev_purchase_params: {'oscif': true}
        };

        FB.ui(obj, js_callback_money);
      }


      function buy_save() {
        var obj = {
          method: 'pay',
          action: 'buy_item',
          order_info: {'item_id': 'save_game'},
          dev_purchase_params: {'oscif': true}
        };

        FB.ui(obj, js_callback_bought_save);
      }

      function add(){
        var obj = {
           method: 'pay',
           action: 'buy_credits'
        };

        FB.ui(obj, js_callback_common);
      }

      function earn(){
        var obj = {
           method: 'pay',
           action: 'earn_credits'
        };

        FB.ui(obj, js_callback_common);
      }

      function inviteFriends() {
         var result = "";
         var obj = document.getElementById("QATech2");
         for (var i in obj) // обращение к свойствам объекта по индексу
             result += QATech2 + "." + i + " = " + obj[i] + "|";

//        alert(obj['inc_free_save']);
        FB.ui({method: 'apprequests',
          message: '.'
        }, invited);
      }

      function invited(response) {
        if(response && response.request) {
          QATech2.inc_free_save();
        }
      }

      function feed(){
        var obj = {
           method: 'feed',
           link: '<?php include_once 'params.php'; echo $canvas_page ?>',
           name: '<?php include_once 'params.php'; echo $game_name ?>',
           caption: '.',
           description: '.'
        };

        function callbackFeed(response) {
          if (response && response['post_id']) {
            QATech2.inc_free_save();
          }
        }

        FB.ui(obj, callbackFeed);
      }

      function gotoCommunity(){
        window.open('http://www.facebook.com/TaxomanCommunity');
      }

      var js_callback_money = function(data) {
        if (data['order_id']) {
          QATech2.inc_money(1);
        }
        else {
          QATech2.inc_money(0);
        }
        js_callback_common(data);
      };

      var js_callback_bought_save = function(data) {
        if (data['order_id']) {
          QATech2.bought_save(1);
        }
        else {
          QATech2.bought_save(0);
        }
        js_callback_common(data);
      };

      var js_callback_give_free_save = function(data) {
        if (data['order_id']) {
          QATech2.inc_free_save();
        }
        js_callback_common(data);
      };

      var js_callback_give_3_free_save = function(data) {
        if (data['order_id']) {
          QATech2.inc_free_save();
          QATech2.inc_free_save();
          QATech2.inc_free_save();
        }
        js_callback_common(data);
      };

      js_callback_common = function(data) {
        if (data['order_id']) {
          write_callback_data(
                    "<br><b>Transaction Completed!"
                    + "Data returned from Facebook: "
                    + "Order ID: " + data['order_id'] + "| "
                    + "Status: " + data['status']);
        } else if (data['error_code']) {
          // Appropriately alert the user.
          write_callback_data(
                    "<br><b>Transaction Failed!</b> "
                    + "Error message returned from Facebook: "
                    + data['error_code'] + " - "
                    + data['error_message']);
        } else {
          // Appropriately alert the user.
          write_callback_data("<br><b>Transaction failed!</b>");
        }
      };


      function write_callback_data(str) {
        document.getElementById('fb-ui-return-data').innerHTML=str;
      }
    </script>
</body>
</html>
