<?php

/*

	Template Name: Contact Page

*/

get_header();

the_post();

get_template_part( 'includes/inner_header' );

?>

<!-- =====================================================================================================================================

													C O N T A C T

====================================================================================================================================== -->



<section class="contact">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="row">

          <div class="col-md-6 no-rpad">

            <div class="register clearfix"> 
            
            <div class="caption category-caption">

              <h2><?php echo coupon_get_option( 'contact_form_title' ); ?></h2>

              <span class="sep"></span> </div>

              <!-- form -->

              <div class="form register-form">

                <div class="send_result"></div>

                <form action="" method="" class="contact_form">

                  <fieldset>

                    <div class="form-group">

                      <?php /*?><label>

                       <?php _e( 'Your name', 'coupon' ); ?>

                      </label><?php */?>

                      <input type="text" placeholder="Your name" class="form-control form-control-custom" name="name">

                    </div>

                    <div class="form-group">

                      <?php /*?><label>

                        <?php _e( 'Your email', 'coupon' ) ?>

                      </label><?php */?>

                      <input type="email" placeholder="Your email" class="form-control form-control-custom" name="email">

                    </div>

                    <div class="form-group">

                     <?php /*?> <label>

                        <?php _e( 'Subject', 'coupon' ) ?>

                      </label><?php */?>

                      <input type="text" placeholder="Subject" class="form-control form-control-custom" name="subject">

                    </div>

                    <div class="form-group">

                     <?php /*?> <label>

                        <?php _e( 'Message', 'coupon' ) ?>

                      </label>
<?php */?>
                      <!--<textarea placeholder="Message" class="form-control form-control-custom message-control" name="message"></textarea>-->
						<input type="text" placeholder="Message" class="form-control form-control-custom" name="message">
                    </div>

                    <div class="clearfix">

                      <button type="button" class="btn btn-custom btn-default btn-block send_contact">

                      <?php _e( 'Send', 'coupon' ) ?>

                      </button>

                    </div>

                  </fieldset>

                </form>

              </div>

              <!-- .form --> 

              

            </div>

          </div>

          <div class="col-md-6 main_content no-lpad">

          <div class="contestright">  <div class="main_content1">

            

            	<?php if ( ! dynamic_sidebar( 'contact_page_right_top' ) ) : ?>

				

				<?php endif; ?>

            

              <!--<div class="caption category-caption">

                <h2>About Us</h2>

                <span class="sep"></span> </div>

              <div class="maincontext">

                <?php //the_content(); ?>

              </div>-->

            </div>

            <div class="main_content1">

            

            	<?php if ( ! dynamic_sidebar( 'contact_page_right_bottom' ) ) : ?>

				

				<?php endif; ?>

            

              <!--<div class="caption category-caption">

                <h2>About Us</h2>

                <span class="sep"></span> </div>

              <div class="maincontext">

                <?php //the_content(); ?>

              </div>-->

            </div></div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>

<?php

get_template_part( 'includes/shop_carousel' );

get_footer();

?>

