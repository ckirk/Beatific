<?php

get_header();

the_post();

get_template_part( 'includes/inner_header' );

$post_meta = get_post_meta( get_the_ID() );

$offer_expire = coupon_get_smeta( 'offer_expire' , $post_meta, '');

$offer_images = coupon_smeta_images( 'offer_images' , $post_meta, array(), get_the_ID());

$offer_url = coupon_get_smeta( 'offer_url' , $post_meta, '');

$promo_text = coupon_get_smeta( 'promo_text' , $post_meta, '');



$page_content = get_the_content();

?>

<!-- =====================================================================================================================================

											B L O G - S I N G L E   C O N T E N T

====================================================================================================================================== -->

<section class="daily_offers">



        <div class="container">

            <div class="row">



                <div class="col-md-12">

                    <div class="caption category-caption">

                        <h2><?php echo coupon_page_title() ?></span>

                        </h2>

                       <!-- <p><?php echo coupon_page_subtitle() ?></p>-->

                    </div>

                </div>

<div class="col-md-12">



                <!-- coupon-single-container -->

                <div class="col-md-9 coupon_list">



                    <!-- row -->

                    <div class="row">



						<?php if( !empty( $offer_images ) && strpos( $page_content, '[rev_slider' ) === false ): ?>

							<div class="post col-md-12">

								

								<!-- coupon-inner -->

								<div class="blog-inner">

									

									<div class="flexslider">

										<ul class="slides">

											<?php foreach( $offer_images as $image_id ): ?>

												<?php $image = coupon_get_attachment( $image_id, 'blog_large' ); ?>

												<li>  <img src="<?php echo esc_url( $image['src'] ); ?>" title="<?php echo esc_attr( $image['caption'] ) ?>" alt="<?php echo esc_attr( $image['caption'] ) ?>" /></li>

											<?php endforeach; ?>

										</ul>

									</div>



								</div>

								<!-- coupon-inner -->



							</div>

						<?php  endif; ?>

                        <!-- .coupon-single-container -->

                        

                        <!-- coupon-info-container -->

                        <div class="col-md-12 <? if( !empty( $offer_images )){?> main_content <? }?>">

                             <h2><?php echo coupon_page_title() ?></span> </h2>

							<span class="horizontal"></span>

							<?php echo apply_filters( 'the_content', $page_content ); ?>

							

							<?php echo do_shortcode('[ssba]'); ?>

                        </div>

                        <!-- .coupon-info-container -->



                    </div>

                </div>

                <!-- .coupon-single-container -->



				<!-- sidebar -->

                <div class="col-md-3 coupon_list daily_offers_list coupon_list_sidebar">



				<!-- item-1 -->

				<div class="featured-item-container">

					<div class="featured-item">

						<?php if( has_post_thumbnail() || !empty( $offer_shop_logo ) ): ?>

							<a href="<?php echo $offer_url; ?>">

							<div class="logotype logotype-no-padding">

								<div class="logotype-image">

									<?php

													//$img_data = wp_get_attachment_image_src( the_post_thumbnail() , 'full' );

										if(has_post_thumbnail())

										{?>

											

												<?php coupon_get_attachment(the_post_thumbnail(), 'full' );?>

											

									<?php } ?>

								</div>

							</div>

							<?php 

							$shop_meta = get_post_meta( $shop_id );

							$shop_logo_icon = coupon_get_smeta( 'shop_logo_icon',$shop_meta );

							if( !empty( $shop_logo_icon ) ):

							$img_data = coupon_get_attachment( $shop_logo_icon, 'full' );

							?>

							<img class="hover_logo" src="<?php echo esc_url( $img_data['src'] ); ?>">

							<?php endif; ?></a>

						<?php endif; ?>

						<div class="featured-item-content">

							<h4><?php the_title(); ?></h4>

							<p><?php echo coupon_page_title() ?></p>

							<?php

							$has_ratings = coupon_get_option( 'code_dailly_ratings' );

							if( in_array( 'dailly', $has_ratings ) ){

								echo coupon_get_ratings();

							}

							?>

                            <?php if(coupon_get_option( 'display_meals' ) > 0){?>

                            <a href="#_" class="info pop-over" data-title="<b>Meals</b>" data-content="<p>When you use this coupon <br /><?php echo ($offer_meals)?$offer_meals:'no'; ?> meals would be provided.</p>">			

							<div class="item-meals">

							<div class="pull-left">

                            <span class="fa fa-meal"></span>

							<span class="fa fa-arrow-right"></span>

							</div>

							<div class="pull-right">

							(<?php echo ($offer_meals)?$offer_meals:'0'; ?> meals)

							</div>

                            </div>

							</a>

                            <?php }?>

						</div>

						

					</div>

					<?php if( !empty( $offer_url ) ): ?>

								<a href="<?php echo !empty( $offer_url ) ? esc_url( $offer_url ) : '' ?>" class="btn btn-full buy_now" target="_blank">

									<?php _e( 'Buy Now ', 'coupon' ) ?>

								</a>

					<?php endif; ?>	

					<div class="item-meta daily-meta">

							<ul class="list-inline list-unstyled">

								<li>

									<a href="javascript:;">

										<span class="fa fa-clock-custom-small pull-left">

					</span>

										<span class="time pull-left" style="padding:5px;">

										<div class="countdown countdown-listing" data-time="<?php echo esc_attr( $offer_expire ); ?>" data-days_text="<?php esc_attr_e( 'days', 'coupon' ); ?>" data-day_text="<?php esc_attr_e( 'day', 'coupon' ); ?>" data-style="daily_offer"></div>

										</span>

									</a>

								</li>

							</ul>

						</div>

					

				</div>



                </div>

                <!-- .sidebar -->

</div>

            </div>

            <!-- .row -->

        </div>

        <!-- .container -->



    </section>

<?php

get_footer();

?>