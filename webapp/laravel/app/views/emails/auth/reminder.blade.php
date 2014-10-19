<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>รีเซตรหัสผ่าน</h2>

		<div>
			กรุณาคลิ้กที่ลิ้งนี้เพื่อทำการรีเซตรหัสผ่านบัญชีของคุณ: {{ URL::to('password/reset', array($token)) }}.<br/>
			หมายเหตุ: ลิ้งนี้จะหมดอายุใน {{ Config::get('auth.reminder.expire', 60) }} นาที.
		</div>
		<p><i>NFSITE.ME | Automatic CMS Installation Service</i></p>
	</body>
</html>
