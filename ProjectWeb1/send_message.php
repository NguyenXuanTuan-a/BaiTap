<?php
require('connection.inc.php');
require('functions.inc.php');
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$comment=get_safe_value($con,$_POST['message']);
$added_on=date('Y/m/d H:i:s');
mysqli_query($con,"insert into contact(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
echo "Cảm ơn bạn đã gửi tin nhắn cho chúng tôi";
?>