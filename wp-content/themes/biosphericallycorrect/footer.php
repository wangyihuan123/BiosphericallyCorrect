	
	<div id="footer" role="contentinfo" class="clearfix">
		<h5>benchmark verification</h5>
		<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
	</div>

</div>

<script type="text/javascript">
$ = jQuery.noConflict();

$(document).ready(function() {

	var togglePanel = function() {
		$("#network_panel").animate({
			top: ( $("#network_panel").hasClass('open') ) ? '-70' : '-20'
		},500, function() {
			$(this).toggleClass('open');
		});	
	}
	
	$("#network_panel_tab").click(togglePanel);
	$("#network_panel_close").click(togglePanel);

});
</script>

<?php wp_footer(); ?>

</body>
</html>
