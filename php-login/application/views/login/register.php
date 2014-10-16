<div id="content" class="with_sidebar cleaefix">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>


    <div class="register-default-box">
        <h1>Register</h1>
        <br><br>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>login/register_action" name="registerform" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="login_input_username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="login_input_username" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
                    <span style="display: block; font-size: 14px; color: #999;">(only letters and numbers, 2 to 64 characters)</span>
                </div>
            </div>
            <div class="form-group">
                <label for="login_input_email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-7">
                    <input type="email" class="form-control" id="login_input_email" name="user_email" required />
                    <span style="display: block; font-size: 14px; color: #999;">
                    (please provide a <span style="text-decoration: underline; color: mediumvioletred;">real email address</span>,
                    you'll get a verification mail with an activation link)
                </span>
                </div>
            </div>
            <div class="form-group">
                 <label for="login_input_password_new" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="login_input_password_new" name="user_password_new" pattern=".{6,}" required autocomplete="off">
                    <span class="login-form-password-pattern-reminder">
                        (min. 6 characters!）Please note: using a long sentence as a password is much much safer then something like "!c00lPa$$w0rd").
                        Have a look on
                        <a href="http://security.stackexchange.com/questions/6095/xkcd-936-short-complex-password-or-long-dictionary-passphrase">
                            this interesting security.stackexchange.com thread
                        </a>.
                    </span>
                </div>
            </div>
            <div class="form-group">
                 <label for="login_input_password_repeat" class="col-sm-2 control-label">Repeat Password</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="login_input_password_repeat" name="user_password_repeat" pattern=".{6,}" required autocomplete="off">
                    
                </div>
            </div>
            <div class="form-group">
                

                <!-- <label> Please enter these characters </label> -->
                <label class="col-sm-2 control-label"> Captcha </label>
                <div class="col-sm-7">
                <input type="text" class="form-control"  name="captcha" required />
                <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
                    <img id="captcha" class="clear-both" alt="150x150" src="<?php echo URL; ?>login/showCaptcha" />
                    <!-- quick & dirty captcha reloader -->
                    <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
                </span>
                <!-- <span style="display: block; font-size: 11px; color: #999;">
                        Please note: This captcha will be generated when the img tag requests the captcha-generation
                        (and a real image) from YOURURL/login/showcaptcha. As this is a client-side triggered request, the
                        $_SESSION["captcha"] dump in the footer will not show the captcha characters. The captcha generation
                        happens AFTER the rendering of the footer.
                    </span> -->
                </div>
            </div>
 <!--
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    <div class="checkbox">
                         <label><input type="checkbox"> Remember me</label>
                    </div>
                </div>
            </div> -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                     <button type="submit" class="btn btn-default col-sm-7">Register</button>
                </div>
            </div>
        </form>
    </div>
    <hr />
    

    <div class="post">
        <h2>Register with us</h2>
        <!-- register form -->
        <p>
        As a registered BC Producer you will have a profile page on Shop BC of this site. Here customers and procurement managers will be able to distinguish you as helping to create and supply everyday goods and services in harmony with our Biosphere. Its also potentially a great stepping stone to partnering with us – see In Practice.

        Your page will have your logo, an image of your product/service and information about your BC undertakings as per the 5 criteria areas (see below). Under each criteria section you will be able to upload other documents, images, certifications, that may support your application.

        There is a $250.00 assessment fee for us to review and process your registration and we ask for an annual donation upon approval.

        Conditions of application: Biosphericallycorrect.org holds the sole discretion in accepting or declining the application, on grounds and conditions it determines as being important to maintaining and governing the BC initiative.
        </p>
        <h5 style="line-height: 1.5;">
            Note: registration with us as a BC Producer does not officially mean you have been recognised as obtaining a Biospherically Correct rating but that you are exercising one or more of the 5 Biospherically Correct criteria arenas in your business, helping demonstrate the BC ethos. See In Practise for rated enterprises.
        </h5>

        
    </div>  

</div>
