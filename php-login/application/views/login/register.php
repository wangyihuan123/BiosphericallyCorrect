<div id="content" class="with_sidebar cleaefix">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

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
<!-- 
    <?php if (FACEBOOK_LOGIN == true) { ?>
        <div class="register-facebook-box">
            <h1>or</h1>
            <a href="<?php echo $this->facebook_register_url; ?>" class="facebook-login-button">Register with Facebook</a>
        </div>
    <?php } ?>
 -->
</div>
