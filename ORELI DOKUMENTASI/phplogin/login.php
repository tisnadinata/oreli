<?php include_once('classes/login.class.php'); ?>
<?php include_once('header.php'); ?>

<div id="forgot-form" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php _e('Account Recovery'); ?></h4>
      </div>
      <div class="modal-body">
		<div id="message"></div>
		<form action="forgot.php" method="post" name="forgotform" id="forgotform" class="form-stacked forgotform normal-label">
			<div class="controlgroup forgotcenter">
			<label for="usernamemail"><?php _e('Username or Email Address'); ?></label>
				<div class="control">
					<input id="usernamemail" name="usernamemail" type="text"/>
				</div>
			</div>
			<input type="submit" class="hidden" name="forgotten">
		</form>
      </div>
      <div class="modal-footer">
		<button data-complete-text="<?php _e('Done'); ?>" class="btn btn-primary pull-right" id="forgotsubmit"><?php _e('Submit'); ?></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
	<div class="main login col-md-4">
		<form method="post" class="form normal-label" action="login.php">
		<fieldset>
		<h4><?php _e('Sign in to Jigowatt'); ?></h4>
			<div class="form-group">
				<label for="username" class="login-label"><?php echo $login->use_emails ? _('Email address') : _('Username'); ?></label>
				<input class="form-control" id="username" name="username" placeholder="<?php _e('Username'); ?>" type="text"/>
				<span class="forgot"><a data-toggle="modal" href="#" data-target="#forgot-form" id="forgotlink" tabindex=-1><?php _e('Trouble signing in'); ?></a>?</span>
			</div>

			<div class="form-group">
				<label for="password" class="login-label"><?php _e('Password'); ?></label>
				<input class="form-control" id="password" name="password" size="30" placeholder="<?php _e('Password'); ?>" type="password"/>
			</div>
		</fieldset>

		<input type="hidden" name="token" value="<?php echo $_SESSION['jigowatt']['token']; ?>"/>
		<input type="submit" value="<?php _e('Sign in'); ?>" class="btn btn-default login-submit" id="login-submit" name="login"/>

		<label class="remember" for="remember">
			<input type="checkbox" id="remember" name="remember"/><span><?php _e('Stay signed in'); ?></span>
		</label>

		<p class="signup"><a href="sign_up.php"><?php _e('New to Jigowatt? <strong>Join today!</strong>'); ?></a></p>

		<?php if ( !empty($jigowatt_integration->enabledMethods) ) : ?>

		<div class="">
			<?php foreach ($jigowatt_integration->enabledMethods as $key ) : ?>
				<p><a href="login.php?login=<?php echo $key; ?>"><img src="assets/img/<?php echo $key; ?>_signin.png" alt="<?php echo $key; ?>"></a></p>
			<?php endforeach; ?>
		</div>

		<?php endif; ?>

		</form>
	</div>

</div>
<?php include_once('footer.php'); ?>