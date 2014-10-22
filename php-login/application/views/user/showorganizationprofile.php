<div class="content">
    <h1><?php echo $this->profile->organisation_name; ?> </h1>
    <!-- <p>This controller/action/view shows all public information about a certain user.</p> -->

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
<br>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <dl class="dl-horizontal">
                <dt>
                    User ID
                </dt>
                <dd>
                    <?php echo $this->profile->user_id; ?>
                </dd>
                <dt>
                    Orgarization Name
                </dt>
                <dd>
                    <?php echo $this->profile->organisation_name; ?>
                </dd>
                
                <dt>
                    Contact Person
                </dt>
                <dd>
                    <?php echo $this->profile->first_name . " ". $this->profile->last_name; ?>
                </dd>
                
                <dt>
                    Orgarization Address
                </dt>
                <dd>
                     <?php echo $this->profile->address; ?>
                </dd>
                <dt>
                    Town/City
                </dt>
                <dd>
                     <?php echo $this->profile->town_city; ?>
                </dd>
                <dt>
                    Phone
                </dt>
                <dd>
                     <?php echo $this->profile->phone; ?>
                </dd>
                <dt>
                    Website
                </dt>
                <dd>
                    <?php echo $this->profile->phone; ?>
                </dd>
                <dt>
                    Public Profile
                </dt>
                <dd>
                    <a href="<?php echo URL . '/profile/index'; ?>"> Click Here for detail</a>
                </dd>
            </dl>
        </div>
    </div>
</div>

<!-- 
    <?php if ($this->user) { ?>
        <p>
            <span style="color: red;">NOTE: be sure NOT to show email addresses of users in a real app. This is just a demo.</span>
            <table class="overview-table">
            <?php

                if ($this->user->user_active == 0) {
                    echo '<tr class="inactive">';
                } else {
                    echo '<tr class="active">';
                }

                echo '<td>'.$this->user->user_id.'</td>';
                //echo '<td class="avatar"><img src="'.$this->user->user_avatar_link.'" /></td>';
                echo '<td>'.$this->user->user_name.'</td>';
                echo '<td>'.$this->user->user_email.'</td>';
                echo '<td>Active: '.$this->user->user_active.'</td>';

                $last_login_time = date('m/d/Y h:i:s a', $this->user->user_last_login_timestamp);
                $creation_time = date('m/d/Y h:i:s a', $this->user->user_creation_timestamp);

                echo '<td>Active: '.$this->user->user_active.'</td>';
                echo '<td>last: '. $last_login_time .'</td>';
                echo "</tr>";
            ?>
            </table>
        </p>
    <?php } ?> -->
</div>
