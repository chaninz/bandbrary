<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	
</head>
<body>
	<h4>ลืมรหัสผ่าน</h4>
	<p>กรุณาคลิกที่ลิงค์เพื่อตั้งค่ารหัสผ่านใหม่ <a href="<?= base_url('account/password/reset?code='.$code) ?>"><?= base_url('account/password/reset?code='.$code) ?></a></p>
</body>
</html>