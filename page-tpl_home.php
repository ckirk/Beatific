<?php



/*



	Template Name: Page Home



*/



get_header();



$home_group = (array)coupon_get_option( 'home_groups' );



?>



<!-- =====================================================================================================================================



													S C R E E N



====================================================================================================================================== -->



<section class="screen">







	<!-- container -->



	<div class="container">



		<!-- row -->



		<div class="row">



			<!-- screen-content -->



			<div class="screen-content home-screen clearfix">



				<!-- slogan -->



				<div class="col-md-12">



					<div class="slogan col-md-10">					



						<div class="slogan_message">



							<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 big_search_btn">



								<a href="javascript:;">



								<img src="<?php echo get_bloginfo('template_directory');?>/images/home_search_icon.jpg" alt="search-btn" />



								</a>



							</div>



							<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 message">



								<h1><?php echo coupon_get_home_subtitle(); ?></h1>



								<!--<p class="center-block">



									<?php //echo get_bloginfo( 'description', 'display' ); ?>



								</p>-->



							</div>



						</div>



						<?php 



						$filters = coupon_get_option( 'ajax_categories' );



						if( $filters == 'yes' ){



						?>



							<!-- filters -->



							<div class="filter" style="display:none;">



								<!-- shop-search -->



									<form class="form-horizontal search-coupon"  role="search" action="<?php echo site_url('/'); ?>" method="get" id="searchform">



										<div class="form-group has-feedback">



											<input autocomplete="off" type="text" name="s" value="<?php echo $_GET['s'] ;?>" id="search_<?php echo coupon_confirm_hash() ?>" class="form-control ajax_search" id="inputSuccess3" placeholder="<?php esc_attr_e( 'Type in store e.g Macy', 'coupon' ); ?>">



											<input type="hidden" name="post_type" value="shop" /> 



											<input  class="form-control-feedback icon-right" type="submit" alt="Search" value="Search" />



										</div>



										<div class="ajax_search_results">



											<ul class="list-unstyled">



											<ul>



										</div>



									</form>



								<!-- .shop-search -->



							</div>



							<!-- .filters -->



						<?php



						}



						?>



					</div>



				</div>



				<!-- .slogan -->



			</div>



			<!-- .screen-content -->



		</div>



		<!-- .row -->



	</div>



	<!-- .container -->







</section>



<!-- .screen -->







<?php if(coupon_get_option( 'display_meals' ) > 0){?>



<section class="meal_counter hidden-xs">



<?php include('meal_progress.php'); ?>



</section>



<?php }?>



<!-- =====================================================================================================================================



													F E A T U R E D



====================================================================================================================================== -->



<!-- featured -->



<section class="featured">







	<!-- container -->



	<div class="container">







		<!-- row -->



		<div class="row">







			<!-- filter-tabs -->



			<div class="col-md-12 homepages">



				<div class="filter-tabs">



					<ul class="nav nav-tabs list-unstyled list-inline">



						<?php if( in_array( 'feature', $home_group ) ):?>



							<li class="active"><a href="#feature" data-toggle="tab"><?php _e( 'Featured Brands', 'coupon' ) ?> <i class="pull-right"></i></a></li>



						<?php endif; ?>

						<li class="hidden-xs sotnav"><i class="fa fa-circle"></i></li>

						<?php if( in_array( 'popular', $home_group ) ):?>



							<li class="hidden-xs"><a href="#popular" data-toggle="tab"><?php _e( 'Popular Brands', 'coupon' ) ?> <i class="pull-right"></i></a></li>



						<?php endif; ?>

                        

                        <?php if(coupon_get_option( 'display_daily_deals' ) > 0){?>

						<li class="hidden-xs sotnav"><i class="fa fa-circle"></i></li>

						<?php if( in_array( 'daily', $home_group ) ):?>



							<li class="hidden-xs"><a href="#daily" data-toggle="tab"><?php _e( 'Daily Offers', 'coupon' ) ?> <i class="pull-right"></i></a></li>



						<?php endif; ?>



                        <?php }?>

						<li class="hidden-xs sotnav"><i class="fa fa-circle"></i></li>

						<?php if( in_array( 'latest', $home_group ) ):?>



							<li class="hidden-xs"><a href="#latest" data-toggle="tab"><?php _e( 'Latest Brands', 'coupon' ) ?> <i class="pull-right"></i></a></li>



						<?php endif; ?>



					</ul>



				</div>



			</div>



			<!-- .filter-tabs -->



			



			



			<!-- tab-content -->



			<div class="tab-content">



				<?php if( in_array( 'feature', $home_group ) ):?>



					<!-- featured-elements -->



					<div class="tab-pane fade in active" id="feature">



						<!-- feature-container-first -->



						<div class="featured-container col-md-12">







							<!-- first-row -->



							<div class="row">



								<?php



								$featured_codes = coupon_get_list( 'feature' ); 



								//echo '<pre>'.print_r($featured_codes,true).'</pre>';



								coupon_home_list( $featured_codes );



								?>



							</div>



							<!-- .first-row -->



						</div>



						<!-- .feature-container-first -->



					</div>



					<!-- .featured-elements -->



				<?php endif; ?>







				<?php if( in_array( 'popular', $home_group ) ):?>



					<!-- popular-elements -->



					<div class="tab-pane fade in clearfix hidden-xs" id="popular">







						<!-- feature-container-first -->



						<div class="featured-container col-md-12">







							<!-- first-row -->



							<div class="row">



								<?php



								$popular_sort = coupon_get_option('popular_sort');



								if( $popular_sort == 'ratings' ){



									$popular_codes = coupon_get_list( 'ratings' );



								}



								else{



									$popular_codes = coupon_get_list( 'clicks' );



								}



								  coupon_home_list( $popular_codes );



								?>



							</div>



							<!-- .first-row -->







						</div>



						<!-- .feature-container-first -->







					</div>



					<!-- .popular-elements -->



				<?php endif; ?>



				



					<?php if(coupon_get_option( 'display_daily_deals' ) > 0){?>



					<?php if( in_array( 'daily', $home_group ) ):?>



					<!-- latest-elements -->



					<div class="daily_offers_list tab-pane fade in hidden-xs" id="daily">







						<!-- feature-container-first -->



						<div class="featured-container col-md-12">







							<!-- first-row -->



							<div class="row">



								<?php



								coupon_get_daily_list();



								?>



							</div>



							<!-- .first-row -->







						</div>



						<!-- .feature-container-first -->







					</div>



					<!-- .latest-elements -->



				<?php endif; ?>



				<?php }?>



                



				<?php if( in_array( 'latest', $home_group ) ):?>



					<!-- newest-elements -->



					<div class="tab-pane fade in hidden-xs" id="latest">







						<!-- feature-container-first -->



						<div class="featured-container col-md-12">







							<!-- first-row -->



							<div class="row">



								<?php



								$newest_codes = coupon_get_list( 'date' ); 



								coupon_home_list( $newest_codes );



								?>



							</div>



							<!-- .first-row -->







						</div>



						<!-- .feature-container-first -->







					</div>



					<!-- .newest-elements -->



				<?php endif; ?>











			</div>



			<!-- .tab-content -->







		</div>



		<!-- .row -->



	</div>



	<!-- .container -->



</section>



<!-- .featured -->



<hr style="border-color: #e5e5e5; margin: 1px auto; max-width: 1250px;">



<!-- =====================================================================================================================================



													S P E C I A L



====================================================================================================================================== -->



<!-- special -->



<?php



$promo_category = coupon_get_option( 'home_promo_cat' );



if( !empty( $promo_category ) ){



	$category = get_term( $promo_category, 'code_category' );



	if( !empty( $category ) ):



		$cats_num = coupon_get_option( 'home_promo_cat_num' );



		$children = get_terms( 'code_category', array( 'hide_empty' => 0, 'parent' => $promo_category, 'number' => $cats_num ) );



		?>



		<section class="extra_categories special hidden-xs hidden-sm" style="background-color:#fff;">



 



			<!-- container -->



			<div class="container">



				<!-- row -->



				<div class="row">



					<!-- title-column -->



					<div class="special-box col-md-3">



						<div class="caption special-caption">



							



							<?php



								$string =$category->name;



								$words = explode(' ', $string);



								$last_word = array_pop($words);



								$first_chunk = implode(' ', $words);



							?>



							<h2 class="double_font">



								<span class="first_font"><?php echo $first_chunk; ?></span>



								<span class="last_font"><?php echo $last_word; ?></span>



							</h2>



							



							



						</div>



						<div class="line-divider">



							<span class="line-mask green-bg"></span>



						</div>



						<p><?php echo $category->description; ?></p>



						<a href="<?php echo esc_url( coupon_get_permalink_by_tpl( 'page-tpl_categories' ) ); ?>" class="btn btn-custom btn-default btn-lg">



							



								<span class="first_font seeall">See</span>



								<span class="last_font seeall">All</span>



							



						</a>



					</div>



					<!-- .title-column -->



					



					<div class="col-md-9">



						<?php



						if( !empty( $children ) ):



						$counter = 0;



						?>



						<div class="row category-row">



							<?php 



							foreach( $children as $index => $child ): 



								$term_meta = get_option( "taxonomy_".$child->term_id );



								$icon = !empty( $term_meta['category_icon'] ) ? $term_meta['category_icon'] : '';



								if( $counter == 4 ){



									$counter = 0;



									?>



									</div>



									<div class="row category-row">



									<?php



								}



								$counter++;



							?>



								<!-- element-column -->



								<?php if(  $index == 0  ){ ?>



								<div class="border-sep special-item col-md-1 col-sm-12" style="width: 1px; border-right: 1px solid #f5f5f5; padding: 0 0 25px; height: 55px; margin-top: 9%;">



								&nbsp;



								</div>



								<?php }else{ ?>



									



								<div class="border-sep special-item col-md-1 col-sm-12" style="width: 1px; border-right: 1px solid #f5f5f5; padding: 0 25px; height: 55px; margin-top: 9%;">



									&nbsp;



								</div>



									



								<?php } ?>



								



								<div class="special-item col-md-2 col-sm-12">



									<a href="<?php echo esc_url( get_term_link( $child->slug, 'code_category' ) ) ?>">



										<div class="special-item-inner">



											<div class="special-icon">



												<?php if (function_exists('z_taxonomy_image') && z_taxonomy_image_url($child->term_id)): 



												 z_taxonomy_image($child->term_id);?>



												<?php else:	?>



												<span class="fa fa-<?php echo $icon; ?>"></span>



												<?php endif;	?>



											</div>



										</div>



										<h3><?php echo $child->name; ?></h3>



									</a>



								</div>



								<!-- .element-column -->



							<?php endforeach; ?>



						</div>



						<?php endif; ?>



					</div>



				</div>



				<!-- .row -->



			</div>



			<!-- .container -->



		</section>



	<?php



	endif;



}



?>



<!-- .special -->



<hr style="border-color: #e5e5e5; margin: 1px auto; max-width: 1250px;">



<!-- =====================================================================================================================================



													B L O G  L A T E S T



====================================================================================================================================== -->



<!-- blog -->



<?php 



$latest_blogs_num = coupon_get_option( 'home_latest_blogs' );



if( $latest_blogs_num > 0 ):



?>



	<section class="blog">







		<!-- container -->



		<div class="container">



			<!-- row -->



			<div class="row">







				<!-- title -->



				<div class="title blog-title col-md-12">



					



							<h2 class="double_font">



								<span class="last_font">Stories</span>



							</h2>					



				</div>



				<!-- .title -->



			</div>



							



				<?php



				wp_reset_query();



				$blogs = new WP_Query('cat=-3&posts_per_page=3');



				if( $blogs->have_posts() ):



					?>



					<div class="row">



					<?php



					$counter = 0;



					while( $blogs->have_posts() ):



						$blogs->the_post();



						switch( get_post_format() ){



							case 'aside' : $icon = 'edit'; break;



							case 'gallery' : $icon = 'file-picture-o'; break;



							case 'link' : $icon = 'external-link'; break;



							case 'image' : $icon = 'image'; break;



							case 'quote' : $icon = 'quote-right'; break;



							case 'status' : $icon = 'user'; break;



							case 'video' : $icon = 'video-camera'; break;



							case 'audio' : $icon = 'music'; break;



							case 'chat' : $icon = 'wechat'; break;



							default: $icon = 'plus';



						}



						if( $counter == 3 ){



							?>



							</div>



							<div class="row">



							<?php



						}



						?>



						<!-- blog-post-1 -->



						<div class="blog-post col-lg-4 col-md-4 col-sm-6 col-xs-12">



							<!-- blog-inner -->



							<div class="blog-inner blog-inner-home">



								







								<!-- blog-image -->



								<?php if( has_post_thumbnail() ): ?>



									<div class="blog-image">



										<?php the_post_thumbnail( 'blog_latest', array( 'class' => 'img-responsive' ) ); ?>



										<!-- blog-top-icon -->



										<a href="<?php the_permalink() ?>">



											<div class="blog-icon-mask green-bg">



												<i class="fa fa-blog_plus"></i>



											</div>



										</a>



										<!-- .blog-top-icon -->



									</div>



								<?php endif; ?>



								<!-- .blog-image -->







								<!-- blog-content -->



								<div class="blog-content">



									<h4><?php the_title() ?></h4>



									<span class="blog-category">



										<a href="javascript:;"><span class="fa fa-category"></span></a>



										<?php echo coupon_categories_list( get_the_category() ); ?>



									</span>



									<?php echo apply_filters('the_excerpt',get_the_excerpt().'<a class="read-more" href="'.get_permalink().'"> read more </a>'); ?>



								</div>



								<!-- .blog-content -->







								<!-- blog-meta -->



								<div class="item-meta">



									<ul class="list-unstyled">



										<li>



												<?php



												/* get author meta */



												$author_id =  get_the_author_meta('ID');



												



												



												$user_meta = get_user_meta( $author_id, 'coupon_user_meta' );



												$user_meta = array_shift( $user_meta );



												$avatar = '';



												$description = '';



												if( !empty( $user_meta['avatar'] ) ){



													$avatar = $user_meta['avatar'];



												}



											



												?>



												<!-- profile -->



												<div class="author">



														<?php if( !empty( $avatar ) ): ?>



																<!-- avatar-image -->



														<div class="avatar pull-left">



															<img src="<?php echo esc_url( $avatar ); ?>" class="media-object img-thumbnail img-circle img-responsive img-custom-profile" title="" alt="" />



														</div>



														<!-- .avatar-image -->



													<?php endif; ?>



													



													<div class="authorname pull-left">



															<span class="first_font">by</span>



															<span class="last_font">



															<?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?> 



															</span>



													</div>



												</div>



										<!-- .profile -->



									



										</li>



										<li class="show_share_li">



											<a class="show_share pull-left" href="<?php the_permalink(); ?>">



												<span class="fa fa-plus"></span>



											</a>



											<?php 



											if( function_exists( 'show_share_buttons' ) ){



												echo show_share_buttons( '', true );



											}



											?>



										</li>



									</ul>



								</div>



								<!-- .blog-meta -->



							</div>



							<!-- .blog-inner -->



						</div>



						<!-- .blog-post-1 -->



					<?php endwhile; ?>



				</div>



				<?php endif; ?>



			</div>



			<!-- .row -->



		</div>



		<!-- .container -->







	</section>



	<!-- .blog -->



<?php endif; ?>



<hr style="border-color: #e5e5e5; margin: 1px auto; max-width: 1250px;">



<?php get_template_part( 'includes/shop_carousel' ); ?>



<?php



wp_reset_query();



get_footer();



?>



 <script type="text/javascript">



    // $(function() {  



		  // var endDate = "<?php echo esc_attr( coupon_get_option( 'campaign_expire' ) ); ?> 00:00:00";



		 // $('.countdown.styled').countdown({



          // date: endDate,



          // render: function(data) {



            // $(this.el).html("<div>" + this.leadingZeros(data.days, 1) + " &nbsp:<span>days</span></div><div>" + this.leadingZeros(data.hours, 2) + " &nbsp:<span>hrs</span></div><div>" + this.leadingZeros(data.min, 2) + " &nbsp:<span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + "<span>sec</span></div>");



          // }



        // });



	// });



	



	$('.featured-item-container').hover(function(){



	$( this).find('.logotype .logotype-image img' ).fadeTo( "slow",0.12	);



	$( this).find('.hover_logo' ).fadeIn( "slow");



	$( this).find('.coupon-content .shop-meta .list-inline').css('visibility','visible');



	$( this).find('.shop-meta.meals span').css('visibility','visible');



	$(this).find('.fa-star').toggleClass('fa-star fa-star-red');



	$(this).find('.fa-star-o').toggleClass('fa-star-o fa-star-red-o');



	$(this).find('.fa-star-half-o').toggleClass('fa-star-half-o fa-star-red-half-o');



	},



	  function() {



		$( this).find('.logotype .logotype-image img' ).fadeTo( "slow", 10 );



		$( this).find('.hover_logo' ).fadeOut( "slow");



		$( this).find('.coupon-content .shop-meta .list-inline').css('visibility','hidden');



		$( this).find('.shop-meta.meals span').css('visibility','hidden');



		$(this).find('.fa-star-red').toggleClass('fa-star-red fa-star');



		$(this).find('.fa-star-red-o').toggleClass('fa-star-red-o fa-star-o');



		$(this).find('.fa-star-red-half-o').toggleClass('fa-star-red-half-o fa-star-half-o');



	  }



	);



</script>