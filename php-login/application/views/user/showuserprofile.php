<div class="content">
    <h1><?php echo $this->user->user_name . "'s";?> profile</h1>
    <!-- <p>This controller/action/view shows all public information about a certain user.</p> -->

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
<br>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <dl class="dl-horizontal">
                <dt>
                    ID
                </dt>
                <dd>
                    <?php echo $this->user->user_id; ?>
                </dd>
                <dt>
                    Username
                </dt>
                <dd>
                    <?php echo $this->user->user_name; ?>
                </dd>
                
                <dt>
                    Email
                </dt>
                <dd>
                    <?php echo $this->user->user_email; ?>
                </dd>
                <dt>
                    Active
                </dt>
                <dd>
                    <?php if ($this->user->user_active == 0) {
                            echo 'Inactive';
                        } else {
                            echo 'Active';
                        }?>
                </dd>
                <dt>
                    echo Last login time
                </dt>
                <dd>
                    <?php echo date('m/d/Y h:i:s a', $this->user->user_last_login_timestamp); ?>
                </dd>
                <dt>
                    Creation time
                </dt>
                <dd>
                    <?php echo date('m/d/Y h:i:s a', $this->user->user_creation_timestamp); ?>
                </dd>
                <dt>
                    Provider type
                </dt>
                <dd>
                    <?php echo $this->user->user_provider_type; ?>
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
