<div id="content" class="with_sidebar cleaefix">

    <!-- echo out the system feedback (error and success messages) -->
    <!-- <?php $this->renderFeedbackMessages(); ?> -->

<!-- <h1>company name should be unique.  and finish the validation </h1> -->
<!-- <?php echo URL."profile/editSave/".$this->basicProfile->user_id;?> -->
    <div class="register-default-box">
        <h1>My Profile</h1>
        <br><br>
        <div class="container">
        <div class="row clearfix">
        <div class="col-md-8 column">
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>profile/editSave/<?php echo $this->basicProfile->user_id;?>" name="profileform" class="form-horizontal" role="form" enctype= "multipart/form-data">
            

            <div class="form-group">
                <label for="producer_company" class="col-sm-3 control-label"><strong>Company / Organisation</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_company" name="company" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_first_name" class="col-sm-3 control-label"><strong>First Name</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_first_name" name="first_name" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_last_name" class="col-sm-3 control-label"><strong>Last Name</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_last_name" name="last_name" />
                </div>  
            </div>
            
            <div class="form-group">
                <label for="producer_address" class="col-sm-3 control-label"><strong>Address</strong></label>
                <div class="col-sm-7">
                <input class="form-control"  type="text" id="producer_address" name="address" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_city" class="col-sm-3 control-label"><strong>Town/City</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_city" name="city" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_phone" class="col-sm-3 control-label"><strong>Phone</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_phone" name="phone" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_email" class="col-sm-3 control-label"><strong>Email Address</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_email" name="email"/>
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_website" class="col-sm-3 control-label"><strong>Website</strong> (no http://)</label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_website" name="website" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_logo_image" class="col-sm-3 control-label"><strong>Logo Image</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="file" id="producer_logo_image" name="logo" />
                </div>
            </div>
            
            <hr />
            
            <div class="form-group">
                <label for="producer_product_name" class="col-sm-3 control-label"><strong>Product Name</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_product_name" name="product[name]"/>
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_product_description" class="col-sm-3 control-label"><strong>Product Description</strong></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="product[description]" id="producer_product_description" rows="3"></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_product_category" class="col-sm-3 control-label"><strong>Product Category</strong></label>
                <div class="col-sm-7">
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
            </div>

            <div class="form-group">
                <label for="producer_product_form" class="col-sm-3 control-label"><strong>Product Form</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_product_form" name="product[form]" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_product_size" class="col-sm-3 control-label"><strong>Product Size</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_product_size" name="product[size]" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_product_formulation" class="col-sm-3 control-label"><strong>Product Formulation</strong></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="product[formulation]" id="producer_product_formulation" rows="3"></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_product_image" class="col-sm-3 control-label"><strong>Product Image</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="file" id="producer_product_image" name="product_image" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_product_country" class="col-sm-3 control-label"><strong>Country of Origin</strong></label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_product_origin" name="product[origin]" />
                </div>
            </div>
            
            <div class="form-group">
                <label for="producer_product_availability" class="col-sm-3 control-label"><strong>Availability</strong><br />(retail locations, website, other)</label>
                <div class="col-sm-7">
                <input class="form-control" type="text" id="producer_product_availability" name="product[availability]" rows="3"/>
                </div>
            </div>
            
            <hr />
            <div class="form-group">
            <div class="col-sm-11">
            <p>Please describe how your company or organisation follows the five key Biospherically Correct principles below, and attach any relevant supporting documents:</p>
            </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label"><strong>Diversity Protection</strong><br />
                        <em>Orientation: Security - how ecologically and socially conscious is the sourcing of the raw materials?</em></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="content[diversity_protection]" rows="6"></textarea> 
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Supporting documents:</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" >&nbsp;</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label"><strong>Green Ingredients</strong><br />
                        <em>Orientation: Selection - how green and mindful of our planet&quo;s total resources are the constituents of the product?</em></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="content[green_ingredients]" rows="6"></textarea>   
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Supporting documents:</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" >&nbsp;</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label"><strong>Positive Functionality</strong><br />
                        <em>Orientation: Significance - what true ecological and social significance does this product have in our lives?</em></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="content[positive_functionality]" rows="6"></textarea> 
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Supporting documents:</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">&nbsp;</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label"><strong>Eco Processes</strong><br />
                        <em>Orientation: Systems - how ecologically advanced are the systems that enable this service to exist?</em></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="content[eco_processes]" rows="6"></textarea>   
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">&nbsp;</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">&nbsp;</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label"><strong>Trade Integrity</strong><br />
                        <em>Orientation: Social Capital - what are the governing human values and how are they exercised and expressed by the enterprise?</em></label>
                <div class="col-sm-7">
                <textarea class="form-control" name="content[trade_integrity]" rows="6"></textarea>   
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">&nbsp;</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">&nbsp;</label>
                <div class="col-sm-7">
                <input class="form-control" type="file" name="files[]" />
                </div>
            </div>
            
            <hr />

            <div class="form-group">
                <label class="col-sm-3 control-label"><strong>Security question</strong><br />What colour is the sky?</label>
                <div class="col-sm-7">
                <input type="radio" name="sky" value="green" /> Green &nbsp; 
                <input type="radio" name="sky" value="blue" /> Blue &nbsp; 
                <input type="radio" name="sky" value="red" /> Red &nbsp; 
                </div>
            </div>

            <hr />
<!-- 
            <div class="form-group">
                <label>&nbsp;</label>
                <span class="required" style="float:right">* All fields are required</span>
                <button type="submit">Submit Registration</button>
            </div> -->

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                     <button class="form-control" type="submit" class="btn btn-default col-sm-7">Submit</button>
                </div>
            </div>
        </form>
        </div>
        </div>
        </div>
    </div>
    <hr />













    <!-- id is from wordpress -->
    <div class="post">
        <h2>For Your Information</h2>
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
       
                    
        </form>
    </div>