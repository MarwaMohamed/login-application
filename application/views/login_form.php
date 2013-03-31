<div id="login_form">
	<h2>Login Form !</h2>
<?php

echo form_open("login/validate_content");
echo form_input('username', set_value('username', 'username'));
echo form_password('password','password');
echo form_submit('submit','login');
echo anchor('login/sign_up','Create account');
?>	
	
	
</div>
