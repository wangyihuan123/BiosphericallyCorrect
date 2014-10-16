<div id="content" class="with_sidebar cleaefix">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>


    <div class="register-default-box">
        <h1>My Profile</h1>
        <br><br>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>profile/editSave" name="profileform" class="form-horizontal" role="form">
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
    


</div>











    <!-- id is from wordpress -->
    <div class="post">
        <h2>Register with us</h2>
        <!-- register form -->
        <p>
        As a registered BC Producer you will have a profile page on Shop BC of this site. Here customers and procurement managers will be able to distinguish you as helping to create and supply everyday goods and services in harmony with our Biosphere. Its also potentially a great stepping stone to partnering with us – see In Practice.

        Your page will have your logo, an image of your product/service and information about your BC undertakings as per the 5 criteria areas (see below). Under each criteria section you will be able to upload other documents, images, certifications, that may support your application.

        There is a $250.00 assessment fee for us to review and process your registration and we ask for an annual donation upon approval.

        Conditions of application: Biosphericallycorrect.org holds the sole discretion in accepting or declining the application, on grounds and conditions it determines as being important to maintaining and governing the BC initiative.
        </p>
        <h5 >
            Note: registration with us as a BC Producer does not officially mean you have been recognised as obtaining a Biospherically Correct rating but that you are exercising one or more of the 5 Biospherically Correct criteria arenas in your business, helping demonstrate the BC ethos. See In Practise for rated enterprises.
        </h5>

        <!-- <br /> -->
        <hr />
    
        <form method="post" action="<?php echo URL; ?>login/register_action" name="registerform"  id="producer_registration" enctype="multipart/form-data">
       
            <div class="row clearfix">
                <label for="producer_company"><strong>Company / Organisation</strong></label>
                <input type="text" id="producer_company" name="company" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_first_name"><strong>First Name</strong></label>
                <input type="text" id="producer_first_name" name="first_name" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_last_name"><strong>Last Name</strong></label>
                <input type="text" id="producer_last_name" name="last_name" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_address"><strong>Address</strong></label>
                <input type="text" id="producer_address" name="address" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_city"><strong>Town/City</strong></label>
                <input type="text" id="producer_city" name="city" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_phone"><strong>Phone</strong></label>
                <input type="text" id="producer_phone" name="phone" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_email"><strong>Email Address</strong></label>
                <input type="text" id="producer_email" name="email"/>
            </div>
            
            <div class="row clearfix">
                <label for="producer_website"><strong>Website</strong> (no http://)</label>
                <input type="text" id="producer_website" name="website" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_logo_image"><strong>Logo Image</strong></label>
                <input type="file" id="producer_logo_image" name="logo" />
            </div>
            
            <hr />
            
            <div class="row clearfix">
                <label for="producer_product_name"><strong>Product Name</strong></label>
                <input type="text" id="producer_product_name" name="product[name]"/>
            </div>
            
            <div class="row clearfix">
                <label for="producer_product_description"><strong>Product Description</strong></label>
                <textarea name="product[description]" id="producer_product_description"></textarea>
            </div>
            
            <div class="row clearfix">
                <label for="producer_product_category"><strong>Product Category</strong></label>
                <select name="post_parent">
                <?php 
            $categories = get_pages(array(
                'child_of' => 739,
                'parent' => 739
            ));
            foreach ( $categories as $category ):
                echo '<option value="' . $category->ID . '">'.$category->post_title.'</option>';
            endforeach;
            ?>
            </select>
            </div>

            <div class="row clearfix">
                <label for="producer_product_form"><strong>Product Form</strong></label>
                <input type="text" id="producer_product_form" name="product[form]" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_product_size"><strong>Product Size</strong></label>
                <input type="text" id="producer_product_size" name="product[size]" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_product_formulation"><strong>Product Formulation</strong></label>
                <textarea name="product[formulation]" id="producer_product_formulation"></textarea>
            </div>
            
            <div class="row clearfix">
                <label for="producer_product_image"><strong>Product Image</strong></label>
                <input type="file" id="producer_product_image" name="product_image" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_product_country"><strong>Country of Origin</strong></label>
                <input type="text" id="producer_product_origin" name="product[origin]" />
            </div>
            
            <div class="row clearfix">
                <label for="producer_product_availability"><strong>Availability</strong><br />(retail locations, website, other)</label>
                <input type="text" id="producer_product_availability" name="product[availability]" />
            </div>
            
            <hr />
            
            <p>Please describe how your company or organisation follows the five key Biospherically Correct principles below, and attach any relevant supporting documents:</p>
            
            <div class="row clearfix">
                <label><strong>Diversity Protection</strong><br />
                        <em>Orientation: Security - how ecologically and socially conscious is the sourcing of the raw materials?</em></label>
                <textarea name="content[diversity_protection]"></textarea> 
            </div>

            <div class="row clearfix">
                <label>Supporting documents:</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label>&nbsp;</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label><strong>Green Ingredients</strong><br />
                        <em>Orientation: Selection - how green and mindful of our planet&quo;s total resources are the constituents of the product?</em></label>
                <textarea name="content[green_ingredients]"></textarea>   
            </div>
            
            <div class="row clearfix">
                <label>Supporting documents:</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label>&nbsp;</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label><strong>Positive Functionality</strong><br />
                        <em>Orientation: Significance - what true ecological and social significance does this product have in our lives?</em></label>
                <textarea name="content[positive_functionality]"></textarea> 
            </div>
            
            <div class="row clearfix">
                <label>Supporting documents:</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label>&nbsp;</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label><strong>Eco Processes</strong><br />
                        <em>Orientation: Systems - how ecologically advanced are the systems that enable this service to exist?</em></label>
                <textarea name="content[eco_processes]"></textarea>   
            </div>
            
            <div class="row clearfix">
                <label>&nbsp;</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label>&nbsp;</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label><strong>Trade Integrity</strong><br />
                        <em>Orientation: Social Capital - what are the governing human values and how are they exercised and expressed by the enterprise?</em></label>
                <textarea name="content[trade_integrity]"></textarea>   
            </div>
            
            <div class="row clearfix">
                <label>&nbsp;</label>
                <input type="file" name="files[]" />
            </div>
            
            <div class="row clearfix">
                <label>&nbsp;</label>
                <input type="file" name="files[]" />
            </div>
            
            <hr />

            <div class="row clearfix">
                <label><strong>Security question</strong><br />What colour is the sky?</label>
                <input type="radio" name="sky" value="green" /> Green &nbsp; 
                <input type="radio" name="sky" value="blue" /> Blue &nbsp; 
                <input type="radio" name="sky" value="red" /> Red &nbsp; 
            </div>

            <hr />

            <div class="row clearfix">
                <label>&nbsp;</label>
                <span class="required" style="float:right">* All fields are required</span>
                <button type="submit">Submit Registration</button>
            </div>
                    
        </form>
    </div>