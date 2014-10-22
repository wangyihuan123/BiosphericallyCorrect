<div class="content">
    <h1>Users Administration</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <!-- <p>
        This controller/action/view shows a list of all users in the system.
        You could use the underlaying code to build things that use profile information
        of one or multiple/all users.
    </p> -->

<br>
    <p>
        <!-- <span style="color: red;">NOTE: be sure NOT to show email addresses of users in a real app.</span> -->
        <!-- <table class="overview-table"> -->

    <div class="container">
    <div class="row clearfix">
        <div class="col-md-8 column">
            <table class="table table-hover">
            <tbody class="success">
        <?php

        foreach ($this->users as $user) {

            // if ($user->user_active == 0) {
            //     echo '<tr class="inactive">';
            // } else {
            //     echo '<tr class="active">';
            // }
            echo '<tr>';
            echo '<td>'.$user->user_id.'</td>';
            // echo '<td class="avatar">';

            // if (isset($user->user_avatar_link)) {
            //     echo '<img src="'.$user->user_avatar_link.'" />';
            // // }

            // echo '</td>';
            echo '<td>'.$user->user_name.'</td>';
            // echo '<td>'.$user->user_email.'</td>';
            echo '<td>Active: '.$user->user_active.'</td>';
            // echo '<td><a href="'.URL.'user/showuserprofile/'.$user->user_id.'">Show user\'s profile</a></td>';
            // echo '<td><a href="'.URL.'user/showcompanyprofile/'.$user->user_id.'">Show organization\'s profile</a></td>';

            echo '<td><a href="'.URL.'user/showuserprofile/'.$user->user_id.'" class="btn btn-primary btn-xs active" role="button">Show user\'s profile</a></td>';
            echo '<td><a href="'.URL.'user/showOrganizationProfile/'.$user->user_id.'" class="btn btn-primary btn-xs active" style="text-decoration: none;" role="button">Show organizatoin\'s profile</a></td>';
            echo "</tr>";
        }

        ?>
        </tbody>
        </table>
    </p>
</div>
