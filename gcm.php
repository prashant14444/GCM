<!DOCTYPE HTML>
<html>  
<body>

<form action="" method="POST">
Name: <input type="text" name="id" ><br><br>
Message: <input type="text" name="message"><br><br>
Title: <input type="text" name="title"><br><br>
<input type="submit" value="Send"><br><br><br><br>
</form>

</body>
</html>


<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCk96x_h9XPVgjXSD6JmuMilI7QINRsFFQ' );
$registrationIds = array( $_POST['id'] );
// prep the bundle

$message_to_push=$_POST['message'];
$message_title=$_POST['title'];
$msg = array
(
	'message' 	=> $message_to_push,
	'title'		=> $message_title,
	'created_at' =>''
);

$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
//echo $result;
?>



