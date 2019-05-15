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

    <form method="post">


        <h2 class="text-center">New User: Sign Up</h2>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" maxlength="10" class="form-control" id="phone_number" name="cno" <?php if(isset($_SESSION['cno'])){ echo 'value="'.$_SESSION['cno'].'" readonly'; } else { echo 'placeholder="+91 XXXXX XXXXX" required';} ?> >
            </div>
        </div>

        <?php if (!isset($_SESSION['cno'])): ?>
          <input value="+91" type="hidden" id="country_code" />

          <div class="form-group">
              <button onclick="smsLogin();" type="button" id="submitbutton" class="btn btn-success btn-block">Verify Mobile</button>
          </div>
          <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
            <script>
                    //https://developers.facebook.com/docs/accountkit/webjs
                    //$(".message").append("<p>initialized Account Kit.</p>");

                    // initialize Account Kit with CSRF protection
                    AccountKit_OnInteractive = function(){
                      AccountKit.init(
                        {
                          appId:"172083197033106",
                          state:"ssjkfhjfkdshfskj34554kjhh",
                          version:"v1.1",
                          fbAppEventsEnabled:true
                        }
                      );
                    };


                    // login callback
                    function loginCallback(response) {
                      if (response.status === "PARTIALLY_AUTHENTICATED") {
                        var code = response.code;
                        var csrf = response.state;
                        $("#submitbutton").html("Connecting... Please Wait");
                          //$(".message").append("<p>Received auth token from facebook -  "+ code +".</p>");
                          //$(".message").append("<p>Triggering AJAX for server-side validation.</p>");

                          $.post("verify.php", { code : code, csrf : csrf }, function(result){
                              //$(".message").append( "<p>Server response : " + result + "</p>" );

                              if(result==1){
                                  location.href="home";
                              } if(result==2){
                                  $("#phone_number").attr('readonly');
                                  $("#submitbutton").slideUp().remove();
                                  $("#submit").slideDown();
                              } else {
                                  $(".message").empty();
                                  $(".message").html("Please Retry");
                              }
                          });

                      }
                      else if (response.status === "NOT_AUTHENTICATED") {
                        // handle authentication failure
                          //$(".message").append("<p>( Error ) NOT_AUTHENTICATED status received from facebook, something went wrong.</p>");
                      }
                      else if (response.status === "BAD_PARAMS") {
                        // handle bad parameters
                          //$(".message").append("<p>( Error ) BAD_PARAMS status received from facebook, something went wrong.</p>");
                      }
                    }


                    // phone form submission handler
                    function smsLogin() {
                      var countryCode = document.getElementById("country_code").value;
                      var phoneNumber = document.getElementById("phone_number").value;
                      //$(".message").append("<p>Connecting... Please Wait</p>");
                      AccountKit.login(
                        'PHONE',
                        {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
                        loginCallback
                      );
                    }


                    // email form submission handler
                    function emailLogin() {
                      var emailAddress = document.getElementById("email").value;
                      AccountKit.login(
                        'EMAIL',
                        {emailAddress: emailAddress},
                        loginCallback
                      );
                    }

                    (function($) {
                        $.fn.inputFilter = function(inputFilter) {
                          return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                            if (inputFilter(this.value)) {
                              this.oldValue = this.value;
                              this.oldSelectionStart = this.selectionStart;
                              this.oldSelectionEnd = this.selectionEnd;
                            } else if (this.hasOwnProperty("oldValue")) {
                              this.value = this.oldValue;
                              this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                            }
                          });
                        };
                      }(jQuery));

                      $("#phone_number").inputFilter(function(value) {
                        return /^\d*$/.test(value);
                      });
                  </script>
        <?php endif; ?>

        <div class="text-center social-btn">
            <?php if(!isset($_SESSION['userData'])) echo '<center><a href="app/social-login/fb/">Fetch Details From Facebook</a></center>';
            else echo 'Loged In as '.$_SESSION['userData']['first_name'].' <img src="'.$_SESSION['userData']['picture'].'" alt="'.$_SESSION['userData']['first_name'].'" width="50" height="50"> ';?>

        </div>

        <div class="or-seperator"><i>or</i></div>

        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" id="email" name="email" <?php if(isset($_SESSION['userData']['email'])) echo 'value="'.$_SESSION['userData']['email'].'" readonly'; else echo 'maxlength="150" placeholder="Email ID" required';  ?> >
            </div>
        </div>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" id="fullname" name="fullname" <?php if(isset($_SESSION['userData']['first_name'])) echo 'value="'.$_SESSION['userData']['first_name'].' '.$_SESSION['userData']['last_name'].'" readonly'; else echo 'maxlength="150" placeholder="Full Name" required';  ?>>
            </div>
        </div>
        <div class="form-group">
            <button <?php if (!isset($_SESSION['cno'])){ echo 'style="display:none;"';} ?> type="submit" id="submit" name="submit" value="signup" class="btn btn-success btn-block">Complete Signup</button>
        </div>
        <div class="form-group">
            <div id="message" class="message">

            </div>
        </div>
        <div class="clearfix">
        </div>

    </form>
</div>
<br><br><br><br>
<footer class="section footer-variant-2 footer-modern context-dark section-top-image section-top-image-dark">
  <div class="footer-variant-2-content">
  </div>
</footer>
