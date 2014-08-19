<div id="content" class="with_sidebar cleaefix">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
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
   
        <?php 
            global $wpdb;
            $wpdb->show_errors();
            
            $wp_upload_dir = wp_upload_dir();

            $logo_url = $wp_upload_dir['url'].'/'.$_FILES['logo']['name'];
            $product_image_url = $wp_upload_dir['url'].'/'.$_FILES['product_image']['name']; 

            // echo "logo_url:" . $logo_url . "<br>";
            // echo "product_image_url:" . $product_image_url . "<br>";
        ?>
<!-- 
        <img src="'.$logo_url.'" width="200" align="right" alt="<?php echo $this->postValue['company'];?>">

        <h2> <?php echo $this->postValue['product_name'];?></h2>

        <h4><?php echo $this->postValue['company'];?></h4>

        <hr>

        <p><?php echo $this->postValue['product']['description'];?></p>

        <p><strong>Country of Origin:</strong> <?php echo $this->postValue['product']['country'];?></p>

        <p><strong>Availability:</strong> <?php echo $this->postValue['product']['availability'];?></p>

        <p><a href="http://<?php echo $this->postValue['website'];?>"><?php echo $this->postValue['website'];?></a></p>

        <hr>

        <h4>Diversity Protection</h4>
        <p><?php echo $this->postValue['content']['diversity_protection'];?></p>
        <br />
        <h4>Green Ingredients</h4>
        <p><?php echo $this->postValue['content']['green_ingredients'];?></p>
        <br />
        <h4>Positive Functionality</h4>
        <p><?php echo $this->postValue['content']['positive_functionality'];?></p>
        <br />
        <h4>Eco Processes</h4>
        <p><?php echo $this->postValue['content']['eco_processes'];?></p>
        <br />
        <h4>Trade Integrity</h4>
        <p><?php echo $this->postValue['content']['trade_integrity'];?></p>
        <br />
        <br />
        <img src="<?php echo $product_image_url;?>" width="300" align="right" alt="<?php echo $this->postValue['product_name'];?>">

        <p><a href="http://<?php echo $this->postValue['website'];?>"><?php echo $this->postValue['website'];?></a></p>
        <?php
        
            $post = array(
              'post_title'            => $_POST['company'],
              'post_name'             => sanitize_title($_POST['company']),
              'post_excerpt'          => '',
              'post_status'           => 'pending', 
              'post_type'             => 'page',
              'post_author'           => 1,
              'ping_status'           => get_option('default_ping_status'), 
              'post_parent'           => $_POST['post_parent'],
              'menu_order'            => 0,
              'post_content'          => $post_content
            );
            $post_id = wp_insert_post($post);

// echo "_FILES :" .  var_dump($_FILES) . "<br>";
            // Attach uploaded files
            if ( $_FILES ) 
            {
                // Logo
                if ( $_FILES['logo']['error'] == 0 )
                {
                    $destination = $wp_upload_dir['path'].'/'.$_FILES['logo']['name'];
                    // echo $destination . "..." . $_FILES['logo']['tmp_name'] . "<br>";
                    if ( move_uploaded_file($_FILES['logo']['tmp_name'],$destination) ):
                        $attachment = array(
                            'guid' => $wp_upload_dir['url'] . '/' . $_FILES['logo']['name'], 
                            'post_title' => $_POST['company'].' logo',
                            'post_content' => '',
                            'post_status' => 'inherit',
                            'post_mime_type' => $_FILES['logo']['type'],
                            'post_parent' => $post_id
                        );
                        wp_insert_attachment( $attachment, $destination, $post_id );    
                    endif;
                }
                
                // Product image
                if ( $_FILES['logo']['error'] == 0 )
                {
                    $destination = $wp_upload_dir['path'].'/'.$_FILES['product_image']['name'];
                    if ( move_uploaded_file($_FILES['product_image']['tmp_name'],$destination) ):
                        $attachment = array(
                            'guid' => $wp_upload_dir['url'] . '/' . $_FILES['product_image']['name'], 
                            'post_title' => $_POST['company'].' product image',
                            'post_content' => '',
                            'post_status' => 'inherit',
                            'post_mime_type' => $_FILES['product_image']['type'],
                            'post_parent' => $post_id
                        );
                        wp_insert_attachment( $attachment, $destination, $post_id );    
                    endif;
                }
                
                // Misc files
                for($i = 0; $i < count($_FILES['files']); $i++)
                {
                    if ( $_FILES['files']['error'][$i] == 0 )
                    {
                        $destination = $wp_upload_dir['path'].'/'.$_FILES['files']['name'][$i];
                        if ( move_uploaded_file($_FILES['files']['tmp_name'][$i],$destination) ):
                            $attachment = array(
                                'guid' => $wp_upload_dir['url'] . '/' . $_FILES['files']['name'][$i], 
                                'post_title' => $_FILES['files']['name'][$i],
                                'post_content' => '',
                                'post_status' => 'inherit',
                                'post_mime_type' => $_FILES['files']['type'][$i],
                                'post_parent' => $post_id
                            );
                            wp_insert_attachment( $attachment, $destination, $post_id );    
                        endif;
                    }   
                } 
            }
            ?>
 -->
            <h4>Thank you. We will review your application and contact you shortly.</h4>
            <p>Please note that processing will not take place until payment has been received and cleared.</p>
            <p>Payment for $250.00 + GST can be via cheque, visa/mastercard or direct credit - phone (09) 353-7888 to make payment.</p>

            <p>Send six samples of each product or a minimum of 12 samples if from a range to:</p>

            <p><strong>New Product Assessment,<br />
            Biospherically Correct<br />
            26 Airedale Street<br />
            Auckland 1010<br />
            New Zealand</strong></p>  
            <p>(Samples will not be returned)</p>
    </div>
    

</div>
