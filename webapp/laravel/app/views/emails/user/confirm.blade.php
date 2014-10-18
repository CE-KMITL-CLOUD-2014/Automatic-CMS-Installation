<h2>Account Confirmation</h2>
<h3>สวัสดีคุณ {{$fullname}} </h3>
<p>คุณสามารถยืนยันบัญชีของคุณโดยทำการคลิ๊กลิ้งนี้ : {{ URL::to('user/confirm/'.$username.'-'.$confirm_code) }}.</p>
<p></p>
<p>ขอบคุณที่ใช้บริการ</p>
<p><i>NFSITE.ME | Automatic CMS Installation Service</i></p>