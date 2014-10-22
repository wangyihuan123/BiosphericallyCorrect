<?php

/**
 * ProfileModel
 * This is basically a simple CRUD (Create/Read/Update/Delete) demonstration.
 */
class ProfileModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Getter for a single profile
     * @param int $profile_id id of the specific profile
     * @return object a single object (the result)
     */
    public function getProfile($user_id)
    {
        $sql = "SELECT * FROM wp_test_user_profile WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    /**
     * Setter for a profile (create)
     * @param string $profile_text profile text that will be created
     * @return bool feedback (was the profile created properly ?)
     */
    // public function create($data)
    // {
    //     // clean the input to prevent for example javascript within the profiles.
    //     $profile_text = strip_tags($profile_text);

    //     $sql = "INSERT INTO profiles (profile_text, user_id) VALUES (:profile_text, :user_id)";
    //     $query = $this->db->prepare($sql);
    //     $query->execute(array(':profile_text' => $profile_text, ':user_id' => $_SESSION['user_id']));

    //     $count =  $query->rowCount();
    //     if ($count == 1) {
    //         return true;
    //     } else {
    //         $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
    //     }
    //     // default return
    //     return false;
    // }


    /**
     * Deletes a specific profile
     * @param int $profile_id id of the profile
     * @return bool feedback (was the profile deleted properly ?)
     */
    public function delete($profile_id)
    {
        $sql = "DELETE FROM profiles WHERE profile_id = :profile_id AND user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':profile_id' => $profile_id, ':user_id' => $_SESSION['user_id']));

        $count =  $query->rowCount();

        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_DELETION_FAILED;
        }
        // default return
        return false;
    }

    public function getBasicProfile($user_id)
    {
        // // TODO: replace *
        // echo "user_id: " . $user_id;
        // echo "_session[user_id]: " . $_SESSION['user_id'];

        $sql = "SELECT * FROM wp_test_user_profile WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // fetch() is the PDO method that gets a single result
        return $query->fetch();
    }

    public function createFolder($dir)
    {
        return is_dir($dir) or (createFolders(dirname($dir)) and mkdir ($dir, 0777));

    }

    public function addToPost($user_id, $data)
    {

        global $wpdb;
        $wpdb->show_errors();
        
        $wp_upload_dir = wp_upload_dir();
        // echo "_FILES :<br>" .  var_dump($_FILES) . "<br>";
        // echo "_POST :<br>" .  var_dump($_POST) . "<br>";

        // echo "company: " . $_POST['company'] . "<br>";

        $logo_url = $wp_upload_dir['url'].'/'.$_FILES['logo']['name'];
        $product_image_url = $wp_upload_dir['url'].'/'.$_FILES['product_image']['name']; 

        // echo "logo_url:" . $logo_url . "<br>";
        // echo "product_image_url:" . $product_image_url . "<br>";

        
        $post_content = '
        <img src="'.$logo_url.'" width="200" align="right" alt="'.$_POST['company'].'">

        <h2>'.$_POST['product_name'].'</h2>

        <h4>'.$_POST['company'].'</h4>

        <hr>

        <p>'.nl2br($_POST['product']['description']).'</p>

        <p><strong>Country of Origin:</strong> '.$_POST['product']['country'].'</p>

        <p><strong>Availability:</strong> '.$_POST['product']['availability'].'</p>

        <p><a href="http://'.$_POST['website'].'">'.$_POST['website'].'</a></p>

        <hr>

        <h4>Diversity Protection</h4>
        <p>'.nl2br($_POST['content']['diversity_protection']).'</p>
        <br />
        <h4>Green Ingredients</h4>
        <p>'.nl2br($_POST['content']['green_ingredients']).'</p>
        <br />
        <h4>Positive Functionality</h4>
        <p>'.nl2br($_POST['content']['positive_functionality']).'</p>
        <br />
        <h4>Eco Processes</h4>
        <p>'.nl2br($_POST['content']['eco_processes']).'</p>
        <br />
        <h4>Trade Integrity</h4>
        <p>'.nl2br($_POST['content']['trade_integrity']).'</p>
        <br />
        <br />
        <img src="'.$product_image_url.'" width="300" align="right" alt="'.$_POST['product_name'].'">

        <p><a href="http://'.$_POST['website'].'">'.$_POST['website'].'</a></p>
        ';


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
        // echo "post_id: " . $post_id;

        // Attach uploaded files
        if ( $_FILES ) 
        {
            // Logo
            if ( $_FILES['logo']['error'] == 0 )
            {
                $destination = $wp_upload_dir['path'].'/$user_id/'.$_FILES['logo']['name'];
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
                    $attach_id = wp_insert_attachment( $attachment, $destination, $post_id );    
                    // echo "logo_name file upload: $attach_id<br>";

                endif;
            }
            
            // Product image
            if ( $_FILES['logo']['error'] == 0 )
            {
                $destination = $wp_upload_dir['path'].'/$user_id/'.$_FILES['product_image']['name'];
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
                    // echo "logo_name file upload: $attach_id<br>";  
                endif;
            }
            
            // Misc files
            for($i = 0; $i < count($_FILES['files']); $i++)
            {
                if ( $_FILES['files']['error'][$i] == 0 )
                {
                    $destination = $wp_upload_dir['path'].'/$user_id/'.$_FILES['files']['name'][$i];
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

        return;
    }


    public function isAlreadyExist($user_id)
    {
        # code...
        $sql = "SELECT user_id FROM wp_test_user_profile WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        // echo "isAlreadyExist: " . $query->rowCount() . "<br>";


        if ($query->rowCount() > 0)
            return true;
        else
            return false;
    }


    public function addToDatabase($user_id, $data)
    {
        
        $data_company = empty($data['company'])? "NULL" : '"'.$data['company'].'"';
        $data_first_name = empty($data['first_name'])? "NULL" : '"'.$data['first_name'].'"';
        $data_last_name = empty($data['last_name'])? "NULL" : '"'.$data['last_name'].'"';
        $data_address = empty($data['address'])? "NULL" : '"'.$data['address'].'"';
        $data_city = empty($data['city'])? "NULL" : '"'.$data['city'].'"';
        $data_phone = empty($data['phone'])? "NULL" : '"'.$data['phone'].'"';
        $data_email = empty($data['email'])? "NULL" : '"'.$data['email'].'"';
        $data_website = empty($data['website'])? "NULL" : '"'.$data['website'].'"';

        // clean the input to prevent for example javascript within the notes.
        // $note_text = strip_tags($note_text);

        $sql = "INSERT INTO wp_test_user_profile (`user_id`, `organisation_name`, `first_name`, `last_name`, `address`, `town_city`, `phone`, `email_address`, `website`, `logo`, `product_name`, `product_description`, `product_category`, `product_form`, `product_size`) 
                VALUES 
                (:user_id, :organisation_name, :first_name, :last_name, :address, :town_city, :phone, :email_address, :website, NULL, NULL, NULL, NULL, NULL,NULL)";
        $query = $this->db->prepare($sql);
        $query->execute(array(  ':user_id' => $user_id, 
                                ':organisation_name' => $data_company, 
                                ':first_name' => $data_first_name, 
                                ':last_name' => $data_last_name, 
                                ':address' => $data_address, 
                                ':town_city' => $data_city, 
                                ':phone' => $data_phone, 
                                ':email_address' => $data_email, 
                                ':website' => $data_website));

        $count =  $query->rowCount();
        if ($count == 1) {
            mail('wangyihuan123@hotmail.com', 
            'Biospherically Correct - Shop BC Registration', 
            $_POST['company'].' has submitted a Shop BC application form:'.chr(10).chr(10).'http://www.biosphericallycorrect.org/wp-admin/post.php?post='.$post_id.'&action=edit'); 

            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_CREATION_FAILED;
        }

        // default return
        return false;

    }


    /**
     * Setter for a profile (update)
     * @param int $profile_id id of the specific profile
     * @param string $profile_text new text of the specific profile
     * @return bool feedback (was the update successful ?)
     */
    public function updateToDatabase($user_id, $data)
    {
        // clean the input to prevent for example javascript within the profiles.
        // $data = strip_tags($data);
        var_dump($data);

        $data_company = empty($data['company'])? "NULL" : '"'.$data['company'].'"';
        $data_first_name = empty($data['first_name'])? "NULL" : '"'.$data['first_name'].'"';
        $data_last_name = empty($data['last_name'])? "NULL" : '"'.$data['last_name'].'"';
        $data_address = empty($data['address'])? "NULL" : '"'.$data['address'].'"';
        $data_city = empty($data['city'])? "NULL" : '"'.$data['city'].'"';
        $data_phone = empty($data['phone'])? "NULL" : '"'.$data['phone'].'"';
        $data_email = empty($data['email'])? "NULL" : '"'.$data['email'].'"';
        $data_website = empty($data['website'])? "NULL" : '"'.$data['website'].'"';

        // echo "data_website: " . $data_website . "<br>";

        $sql = "UPDATE wp_test_user_profile 
            SET organisation_name = :organisation_name, first_name = :first_name, last_name = :last_name, address = :address, town_city = :town_city, phone = :phone, email_address = :email_address, website = :website
            WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':organisation_name' => $data_company,
                        ':first_name' => $data_first_name,
                        'last_name' => $data_last_name, 
                        'address' => $data_address,
                        'town_city' => $data_city, 
                        'phone' => $data_phone, 
                        'email_address' => $data_email, 
                        'website' => $data_website,
                        'user_id' => $user_id));
        
        $count =  $query->rowCount();
        // echo "count: " . $count . "<br>";

        if ($count == 1) {
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_NOTE_EDITING_FAILED;
        }
        // default return
        return false;
    }

    /**
     * @param $user_id
     * @throws Exception
     */
    public function editSave($user_id)
    {
        $this->addToPost($user_id, $_POST);

        if ($this->isAlreadyExist($user_id))
            return $this->updateToDatabase($user_id, $_POST);
        else
            return $this->addToDatabase($user_id, $_POST);

         

    }

}
