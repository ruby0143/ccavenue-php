<html>
<head>
<title> CCAvenue Payment Gateway Integration kit</title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php require_once "config.php"; ?>
<?php

	error_reporting(0);

	$merchant_data='';
	$working_key = '3CCCBA6E34604E7912C25E3053E2985B';
	$access_code = 'AVMQ90KG68BR45QMRB';

	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	$merchant_data .= "order_id=".$orderId;

	$encrypted_data=encrypt($merchant_data,$working_key); 

?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>