<?php
require('connection.inc.php');
require('functions.inc.php');

$type=get_safe_value($con,$_POST['type']);
if($type=='email'){
	$email=get_safe_value($con,$_POST['email']);
	$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
	if($check_user>0){
		echo "email_present";
		die();
	}
	
	$otp=rand(1111,9999);
	$_SESSION['EMAIL_OTP']=$otp;
	$html="$otp is your otp";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=443;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="tuandzpc2000@gmail.com";
	$mail->Password="Aa0982899966";
	$mail->SetFrom("tuandzpc2000@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="New OTP";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "done";
	}else{
		echo "Error occur";
	}
}
?>