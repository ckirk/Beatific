<?php 
if ( is_active_sidebar( 'sidebar-bottom-1' ) || is_active_sidebar( 'sidebar-bottom-2' ) || is_active_sidebar( 'sidebar-bottom-3' ) || is_active_sidebar( 'sidebar-bottom-4' ) ){
	?>
	<!-- footer -->
	<div class="footer-img"><img class="img-responsive" src="<?php echo get_bloginfo('template_directory');?>/images/delight-footer.png" alt="search-btn" /></div>
	<section class="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-4">
					<?php dynamic_sidebar( 'sidebar-bottom-1' ); ?>
				</div>
				
				<div class="col-md-4">
					<?php dynamic_sidebar( 'sidebar-bottom-2' ); ?>
				</div>
				<div class="col-md-4">
					<?php dynamic_sidebar( 'sidebar-bottom-3' ); ?>
				</div>
				<div class="col-md-12  widget4">
					<?php dynamic_sidebar( 'sidebar-bottom-4' ); ?>			
					<!-- copy -->
					<!--<div class="copy_rights">
						<small><?php //echo coupon_get_option( 'copyright_text' ); ?></small>
					</div>-->
					<!-- .copy -->
				</div>
			</div>

		</div>
	</section>
	<!-- .footer -->
<?php
}
?>