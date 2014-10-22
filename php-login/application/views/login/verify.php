<div class="content">
    <h1>Verification</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

	<!-- <?php echo "hellohellohellohellohello". $this->user_id; ?> -->

<!--     <a href="<?php echo URL; ?>login/index">Have a look</a>

    <p>please finish your profile</p>
 -->
 	<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="<?php echo URL; ?>login/index" class="btn btn-primary btn-lg active" role="button">Can not wait</a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="<?php echo URL . 'profile/edit/' . $this->user_id ; ?>" class="btn btn-primary btn-lg active" role="button">To complete the register</a>

	    </div>
	    </div>
	    </div>
</div>
