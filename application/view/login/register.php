<div class="container">

	<?php $this->renderFeedbackMessages(); ?>
	
	<div class="register-default-box">
		
		<h1>Register</h1>
		
		<form method="post" action="<?php echo URL; ?>login/register_action" name="registerform">

			<label for="login_input_username">
				Username
				<span style="display: block; font-size: 14px; color: #999;">(only letters and numbers, 2 to 64 characters)</span>
			</label>
			<input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" />

			<label for="login_input_email">
				User's email
				<span style="display: block; font-size: 14px; color: #999;">
				(please provide a <span style="text-decortation: underline; color: mediumvioletred;"> real email address</span>,
				you'll get a verification mail with an activation link)
				</span>
			</label>
			<input id="login_input_email" class="login_input" type="email" name="user_email" />

			<label for="login_input_password_new">
				Password (min. 6 characters!
				<span class="login-form-password-pattern-reminder">
					Please note: using a long sentence as a password is much safer then something like "!c00lPa$$w0rd").
				</span>
			</label>
			<input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" autocomplete="off" />

			<label for="login_input_password_repeat">Repeat password</label>
			<input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" autocomplete="off" />

			<input type="submit" name="register" value="Register" />
		</form>

	</div>

</div>