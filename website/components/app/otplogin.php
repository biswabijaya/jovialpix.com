<style type="text/css">

    i{
        font-style:normal;
    }

	.login-form {
		max-width: 500px;
    	margin: 30px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
		color: #777;
		padding-bottom: 15px;
		text-align: center;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .login-btn {
        font-size: 15px;
        font-weight: bold;
    }
    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: left;
        line-height: 24px;
    }
	.social-btn .btn i {
		float: left;
		margin: 4px 15px  0 5px;
        min-width: 15px;
	}
	.input-group-addon .fa{
		font-size: 18px;
	}
</style>

<div class="login-form" id="account">

    <form method="post" >
        
    
        <h2 class="text-center">Sign in</h2>
        <div class="text-center social-btn">
            <?php if(!isset($_SESSION['userData'])) echo '<center><a href="app/social-login/fb/"><img src="app/social-login/fb/images/fb-login-btn.png"></a></center>';
            else echo 'Loged In as '.$_SESSION['userData']['email'];?>
        
        </div>
		<div class="or-seperator"><i>or</i></div>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input value="+91" type="hidden" id="country_code" />
                <input type="text" class="form-control" id="phone_number" placeholder="+91 XXXXX XXXXX" required="required">
            </div>
        </div>
        <div class="form-group">
            <button onclick="smsLogin();" type="button" class="btn btn-success btn-block login-btn">Continue via SMS</button>
        </div>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" id="email">
            </div>
        </div>
        <div class="form-group">
            <button onclick="emailLogin();" type="button" class="btn btn-success btn-block login-btn">Continue via Email</button>
        </div>
        <div class="form-group">
            <div class="message">
                <p><center><b>Message Board</b></center></p>
            </div>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right text-success">Forgot Password?</a>
        </div>

    </form>
    <div class="hint-text small">Don't have an account? <a href="#" class="text-success">Register Now!</a></div>
</div>
<footer class="section footer-variant-2 footer-modern context-dark section-top-image section-top-image-dark">
  <div class="footer-variant-2-content">
  </div>
</footer>
