<?php



/*



	Template Name: Search Shops



*/







get_header();



the_post();



get_template_part( 'includes/inner_header' );



global $wp_query;



$args = array_merge( $wp_query->query_vars, array( 'post_type' => 'shop' ) );







$main_query = new WP_Query( $args );



$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page



$page_links_total =  $main_query->max_num_pages;



$page_links = paginate_links( 



				array(



					'base' => add_query_arg( 'paged', '%#%' ),



					'prev_next' => true,



					'end_size' => 2,



					'mid_size' => 2,



					'total' => $page_links_total,



					'current' => $cur_page,	



					'prev_next' => false,



					'type' => 'array'



				)



			 );



?>



<!-- blog-home -->



<section class="blog-home shop-search">







	<!-- container -->



	<div class="container">



		<!-- row -->



		<div class="row">







			<!-- blog-home-container -->



			<div class="coupon_list col-md-9">



				



				<?php if( $main_query->have_posts() ): ?>



					<!-- row -->



					<div class="row">



						<?php while( $main_query->have_posts() ): ?>



							<?php  $main_query->the_post();



							



							$shop_id = get_the_ID();



							$shop_meta = get_post_meta( $shop_id );



							







							?>



							<!-- shop-info -->



                        <div class="shop-info coupon-box  col-md-12">







                            <!-- row -->



                            <div class="row">



								<div class="container shop_cont">



                                <!-- shop-info-image -->



								



                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 shop_detail blog-inner">



                                    <?php if( has_post_thumbnail() ): ?>



									<div class="col-md-5 special-item">



									<a href="<?php echo esc_url( get_permalink( $shop_id ) ); ?>" target="_blank">



                                        <div class="special-item-inner" style="background-color:#f3f3f3;border:0;">



                                            <div class="special-icon shop-logo">



                                                



												<?php 



													$shop_logo_icon = coupon_get_smeta( 'shop_logo_icon',$shop_meta );



													if( !empty( $shop_logo_icon ) ):



													$img_data = coupon_get_attachment( $shop_logo_icon, 'full' );



												?>



												<img src="<?php echo esc_url( $img_data['src'] ); ?>">



												<?php



													else:



													echo 'no image';



													endif;



												?>



												



												<?php //the_post_thumbnail( 'shop_logo' ); ?>



                                            </div>



                                        </div>



                                    </a>



									</div>



									<?php endif; ?> 



									<!-- shop-info-content -->



									<div class="col-md-7 shop_text_con">



										<!-- title -->



										<div class="caption top-caption">



											<a href="<?php echo esc_url( get_permalink( $shop_id ) ); ?>"><h2><?php the_title(); ?></h2></a>



										</div>



										<!-- .title -->







										<!-- shop-info-text -->



										<div class="shop-text main_content">



											<?php the_content(); ?>



										</div>



										<!-- .shop-info-text -->



										<!-- average-saving -->



										<div class="average-saving">



										Average Savings<span>$<?php echo (coupon_get_smeta( 'shop_avg_save',$shop_meta ))?coupon_get_smeta( 'shop_avg_save',$shop_meta ):0; ?></span>



										</div>



										<!-- .average-saving -->



										<!-- social-plugin -->



										<div class="social-plugin">







										</div>



										<!-- .social-plugin -->







									</div>



									<!-- .shop-info-content -->



                                </div>



								



                                <!-- .shop-info-image -->







                            </div>



                           



							</div> <!-- .row -->



                        </div>



                        <!-- .shop-info -->



						<?php endwhile; ?>



						<?php if( !empty( $page_links ) ): ?>



							<!-- pagination -->



							<div class="blog-pagination col-md-12">



								<ul class="pagination">



									<?php echo coupon_format_pagination( $page_links ); ?>



								</ul>



							</div>



							<!-- .pagination -->



						<?php endif; ?>







					</div>



					<!-- .row -->



				<?php else: ?>



					<p><?php _e( 'No Shops Found!', 'coupon' ); ?></p>



				<?php endif; ?>



			</div>



			<!-- .blog-home-container -->







			<!-- sidebar -->



                <div class="coupon_list_sidebar col-md-3">



					<!-- recommended-widget -->



					<div class="caption widget-caption" style="border: 0px none;">



								<h4  style="font-weight: normal; text-align: center; font-size: 18px;"><?php _e( 'Hand-picked Deals by', 'coupon' ); ?></h4>



							</div>



							<div class="widget" style="padding: 0px;">



							



							<div class="blog-inner widget-inner" style="background-color: rgb(250, 250, 250);">



							<div class="line-divider widget-line-divider"></div>



							



							<?php



								/* gte author meta */



								$author_id =  get_the_author_meta('ID');



								$user_meta = get_user_meta( $author_id, 'coupon_user_meta' );



								



								if(sizeof($user_meta) > 0){



									$user_meta = array_shift( $user_meta );



								}else{



									$user_meta = array();



								}



								



								$avatar = '';



								$description = '';



								if( !empty( $user_meta['avatar'] ) ){



									$avatar = $user_meta['avatar'];



								}



								



							?>



							<!-- profile -->



							<div class="logotype">



								<?php if( !empty( $avatar ) ): ?>



									<!-- avatar-image -->



									<div class="logotype-image" style="background:url(<?php echo esc_url( $avatar ); ?>) no-repeat scroll 0 0 / cover;">



										



									</div>



									<!-- .avatar-image -->



								<?php endif; ?>



							</div>



							<div class="authorname" style="margin-top:0px;">

								<?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?> 

								<span class="sep"></span>

							</div>



							<div class="hpicktext"> I am here to save you money by handpicking <a class="loadMore" style="color: red; cursor: pointer;">...more</a> <span class="loadSpan" style="display: none;">the best deals at Links of London</span> <a class="loadLess" style="color: red; cursor: pointer; display:none;">...show less</a> </div>



							<!-- .profile -->



						</div>







					</div>



					<hr class="mdline">



					<!-- .recommended-widget -->



                    <?php get_sidebar( 'right' ); ?>







                </div>



                <!-- .sidebar -->











		</div>



		<!-- .row -->



	</div>



	<!-- .container -->







</section>



<!-- .blog-home -->



<?php



get_template_part( 'includes/shop_carousel' );



get_footer();



?>