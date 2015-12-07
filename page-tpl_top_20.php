<?php

/*

Template Name: Page Top 20

*/

get_header();

the_post();

get_template_part( 'includes/inner_header' );

$show_in_listings = (array)coupon_get_option( 'show_in_listings' );

$featured_per_page = coupon_get_option( 'featured_per_page' );

$popular_per_page = coupon_get_option( 'popular_per_page' );

$newest_per_page = coupon_get_option( 'newest_per_page' );

$tab = !empty( $_GET['tab'] ) ? $_GET['tab'] : '';

/* grab top 20 */

if( in_array( 'top20', $show_in_listings ) ){

$args = array(

'post_type' 	=> 'code',

'meta_key' 		=> 'code_clicks',

'orderby'		=> 'meta_value_num',

'post_status'	=> 'publish',

'order'			=> 'DESC',

'posts_per_page'=> 20,

'fields'        => 'ids',

'meta_query'	=> array(

'relation' => 'AND',

array(

'key' => 'code_for',

'value' => 'all_users',

'compare' => '='

),

array(

'key' => 'code_expire',

'value' => time(),

'compare' => '>='

)

)

);

$popular_sort = coupon_get_option( 'popular_sort' );

if( $popular_sort == 'ratings' ){

$args['meta_key'] = 'coupon_average_rate';

}

$top20 = get_posts( $args );

$top20fake = get_posts( array(

'post_type' 	=> 'code',

'meta_key' 		=> 'code_force_top20',

'orderby'		=> 'meta_value_num',

'post_status'	=> 'publish',

'order'			=> 'ASC',

'posts_per_page'=> 20,

'fields'        => 'ids',

'meta_query'	=> array(

'relation' => 'AND',

array(

'key' => 'code_for',

'value' => 'all_users',

'compare' => '='

),

array(

'key' => 'code_expire',

'value' => time(),

'compare' => '>='

)

)

) );

if( !empty( $top20fake ) ){

foreach( $top20fake as $code_id ){

if( in_array( $code_id, $top20 ) ){

unset( $top20[ array_search( $code_id, $top20 ) ] );

}

$code_position = get_post_meta( $code_id, 'code_force_top20' );

array_splice( $top20, $code_position[0]-1, 0, $code_id );

}

}

}

if( in_array( 'featured', $show_in_listings ) ){

/* grab fetured */

if( $tab == 'featured' ){

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page

}

else{

$cur_page = 1;

}

$featured = new WP_Query(array(

'post_type' 	=> 'code',

'meta_key' 		=> 'code_type',

'orderby'		=> 'meta_value_num',

'post_status' 	=> 'publish',

'order'			=> 'DESC',

'posts_per_page'=> $featured_per_page,

'paged' 		=> $cur_page,

'meta_query'	=> array(

'relation' => "AND",

array(

'key' => 'code_for',

'value' => 'all_users',

'compare' => '='

),

array(

'key' => 'code_expire',

'value' => time(),

'compare' => '>'

),

array(

'key' => 'code_type',

'value' => '1',

'compare' => '='

),			

)

));

$page_links_total =  $featured->max_num_pages;

$page_links = paginate_links( 

array(

'base' => add_query_arg( 'paged', '%#%' ),

'prev_next' => true,

'end_size' => 2,

'mid_size' => 2,

'total' => $page_links_total,

'current' => $cur_page,	

'prev_next' => false,								

'type' => 'array',

'add_args' => array( 'tab' => 'featured' )

)

);

$featured_pagination = coupon_format_pagination( $page_links );

}

if( in_array( 'popular', $show_in_listings ) ){

/* grab popular */

if( $tab == 'popular' ){

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page

}

else{

$cur_page = 1;

}

$popular = new WP_Query(array(

'post_type' 	=> 'code',

'meta_key' 		=> 'code_clicks',

'orderby'		=> 'meta_value_num',

'post_status' 	=> 'publish',

'order'			=> 'DESC',

'posts_per_page'=> $popular_per_page,

'paged' 		=> $cur_page,

'meta_query'	=> array(

'relation' => "AND",

array(

'key' => 'code_for',

'value' => 'all_users',

'compare' => '='

),	

array(

'key' => 'code_expire',

'value' => time(),

'compare' => '>'

),

)

));

$page_links_total =  $popular->max_num_pages;

$page_links = paginate_links( 

array(

'base' => add_query_arg( 'paged', '%#%' ),

'prev_next' => true,

'end_size' => 2,

'mid_size' => 2,

'total' => $page_links_total,

'current' => $cur_page,	

'prev_next' => false,								

'type' => 'array',

'add_args' => array( 'tab' => 'popular' )

)

);

$popular_pagination = coupon_format_pagination( $page_links );

}

if( in_array( 'newest', $show_in_listings ) ){

/* grab newest */

if( $tab == 'newest' ){

$cur_page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; //get curent page

}

else{

$cur_page = 1;

}

$newest = new WP_Query(array(

'post_type' 	=> 'code',

'orderby'		=> 'date',

'post_status' 	=> 'publish',

'order'			=> 'DESC',

'posts_per_page'=> $newest_per_page,

'paged' 		=> $cur_page,

'meta_query'	=> array(

'relation' => "AND",

array(

'key' => 'code_for',

'value' => 'all_users',

'compare' => '='

),	

array(

'key' => 'code_expire',

'value' => time(),

'compare' => '>'

),

)

));

$page_links_total =  $popular->max_num_pages;

$page_links = paginate_links( 

array(

'base' => add_query_arg( 'paged', '%#%' ),

'prev_next' => true,

'end_size' => 2,

'mid_size' => 2,

'total' => $page_links_total,

'current' => $cur_page,	

'prev_next' => false,							

'type' => 'array',

'add_args' => array( 'tab' => 'newest' )

)

);

$newest_pagination = coupon_format_pagination( $page_links );

}

/* calculate width of the boxes based on the active status of the right sidebar */

$max_count = 12;//is_active_sidebar('sidebar-right') ? 3 : 4;

$col_md = 12;//is_active_sidebar('sidebar-right') ? 4 : 3;

?>

<!-- =====================================================================================================================================

T O P 2 0  C O N T E N T

====================================================================================================================================== -->

<!-- top20 -->



<section class="top20list">

  <div class="container"> 

    <!-- featured-boxes-header -->

    <div class="head row clearfix">

      <div class="col-md-12"> 

        <!--<div class="caption top-caption col-md-5">

<h2><?php echo coupon_page_title() ?></h2>

</div>--> 

        <!-- filter-tabs -->

        <div class="filter-tabs clearfix top-20-tabs col-lg-12 col-md-12">

          <ul class="nav nav-tabs list-unstyled list-inline">

            <?php if( in_array( 'top20', $show_in_listings ) ): ?>

            <li <?php echo empty( $tab ) ? 'class="active"' : ''; ?>><a href="#top" data-toggle="tab">

              <?php _e( 'Top 20', 'coupon' ); ?>

              </a> </li>

            <?php endif; ?>

            <li class="hidden-xs sotnav"><i class="fa fa-circle"></i></li>

            <?php if( in_array( 'featured', $show_in_listings ) ): ?>

            <li <?php echo $tab == 'featured' ? 'class="active"' : ''; ?>><a href="#featured" data-toggle="tab">

              <?php _e( 'Featured', 'coupon' ) ?>

              </a></li>

            <?php endif; ?>

            <li class="hidden-xs sotnav"><i class="fa fa-circle"></i></li>

            <?php if( in_array( 'popular', $show_in_listings ) ): ?>

            <li <?php echo $tab == 'popular' ? 'class="active"' : ''; ?>><a href="#popular" data-toggle="tab">

              <?php _e( 'Popular', 'coupon' ) ?>

              </a> </li>

            <?php endif; ?>

            <li class="hidden-xs sotnav"><i class="fa fa-circle"></i></li>

            <?php if( in_array( 'newest', $show_in_listings ) ): ?>

            <li <?php echo $tab == 'newest' ? 'class="active"' : ''; ?>><a href="#newest" data-toggle="tab">

              <?php _e( 'Newest', 'coupon' ) ?>

              </a> </li>

            <?php endif; ?>

          </ul>

        </div>

        <!-- .filter-tabs --> 

      </div>

    </div>

    <!-- .featured-boxes-header --> 

  </div>

</section>

<!-- top20 -->

<section class="top20 clipping-mask"> 

  <!-- container -->

  <div class="container"> 

    <!-- row -->

    <div class="row"> 

      <!-- featured-boxes -->

      <div class="coupon_list col-md-9">

        <div class="caption widget-caption tested"> <span class="rgtsin"><i class="fa fa-check"></i></span>

          <h4>Tested Today</h4>

          <div class="clearfix"></div>

        </div>

        <div class="row">

          <div class="col-md-12 main_content">

            <?php the_content(); ?>

          </div>

          <div class="clearfix"></div>

        </div>

        <!-- row -->

        <div class="row"> 

          <!-- tab-content -->

          <div class="tab-content">

            <?php if( in_array( 'top20', $show_in_listings ) ): ?>

            <div class="tab-pane fade <?php echo empty( $tab ) ? 'in active' : ''; ?>" id="top">

              <div class="featured-container col-md-12">

                <?php if( !empty( $top20 ) ): ?>

                <div class="row clipping">

                  <?php 

$counter = 0;

foreach( $top20 as $code_id ){

$code = get_post( $code_id );

$code_meta = get_post_meta( $code->ID );

$code_type = coupon_get_smeta( 'code_type', $code_meta, '2' );

$code_discount = coupon_get_smeta( 'code_discount', $code_meta, '' );

$code_text = coupon_get_smeta( 'code_text', $code_meta, '' );					

$code_conditions = coupon_get_smeta( 'code_conditions', $code_meta, '' );

$expire_timestamp = coupon_get_smeta( 'code_expire', $code_meta, time() );

$code_api = coupon_get_smeta( 'code_api', $code_meta, '' );

$shop_id = coupon_get_smeta( 'code_shop_id', $code_meta, '' );												

$coupon_label = coupon_get_smeta( 'coupon_label', $code_meta, '' );												

$code_couponcode = coupon_get_smeta( 'code_couponcode', $code_meta, '' );	

$coupon_meals = coupon_get_smeta( 'code_meals', $code_meta, '' );

if( $counter == $max_count ){

$counter = 0;

?>

                </div>

                <div class="row clipping-v2">

                  <?php

}

$counter++;

?>

                  <!-- coupon-box-1 -->

                  <div class="coupon-box col-md-12">

                    <div class="featured-item-container blog-inner col-md-12"> 

                      <!-- row -->

                      <div class="row"> 

                        <!-- coupon-box-discount -->

                        <div class="top20reserved special-item col-lg-3 col-md-3 col-sm-12 col-xs-12 coupHov"> 

                        <a href="<?php echo esc_url( get_permalink( $shop_id ) ); ?>" target="_blank">

                          <?php if( has_post_thumbnail( $shop_id ) ): ?>

                          <?php 

//$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($shop_id, 'medium' , array('class' => 'img-responsive' )) );

//echo get_the_post_thumbnail( $shop_id, 'medium' , array('class' => 'img-responsive' )); ?>

                          <!--<div class="logotype">

<div class="logotype-image" style="background:url(<?php echo esc_url( $feat_image_url ); ?>) no-repeat scroll 0 0 / cover;">

&nbsp;

</div>

</div>-->

                          <?php 

$shop_meta = get_post_meta( $shop_id );

$shop_logo_icon = coupon_get_smeta( 'shop_logo_icon',$shop_meta );

$mTitle = get_the_title($shop_id);

if( !empty( $shop_logo_icon ) ):

$img_data = coupon_get_attachment( $shop_logo_icon, 'full' );

?>

                          <div class="special-item-inner coupon-inner"> <img class="" src="<?php echo esc_url( $img_data['src'] ); ?>"> </div>

                          <?php endif; ?>

                          <?php

else:

?>

                          <div class="special-item-inner coupon-inner orange <?php echo $arrow_fix; ?>">

                            <h2><?php echo $code_discount; ?></h2>

                            <h4><?php echo $code_text; ?></h4>

                          </div>

                          <?php endif; ?>

                          </a> 

                          <div class="clearfix"></div>

                          </div>

                        <?php if(coupon_get_option( 'display_meals' ) > 0){?>

                        <div class="col-md-12 shop-meta meals" style="display:none;"> <a href="#_" class="info pop-over" data-title="<b>Meals</b>" data-content="<p>When you use this coupon <br /><?php echo ($coupon_meals)?$coupon_meals:'no'; ?> meals would be provided.</p>">

                          <div class="meals2n"> <span class="fa fa-meal-gray"></span> <span class="fa fa-arrow-right"></span> <span><span class="ico-loop fa fa-meal"></span><?php echo ($coupon_meals)?$coupon_meals:0; ?> meals</span> </div>

                          </a> </div>

                        <?php }?>

                        <!-- .coupon-box-discount -->

                        <div class="blog-single-content coupon-content col-lg-9 col-md-9 col-sm-12 col-xs-12"> 

                          <!-- coupon-box-content --> 

                          

                          <!-- coupon-box-promo-title -->

                          <div class="shop-promo-title">

                            <h4><a href="<?php echo get_permalink( $code->ID ) ?>"><?php echo $code->post_title; ?></a><span class="adscir"><i class="fa fa-circle"></i></span><span class="asdasda"><a href="javascript:void(0)" class="services-a">Details</a></span></h4>

                            

                            <!--<span class="sep"></span>

<p><?php echo $code->post_content ?>?

<p/>-->

                            

                            <div class="l-select">

                              <div class="l-selection cont-wrap"> <span class="sep"></span>

                                <?php //echo $code->post_content ?>

                                <div class="item-meta blog-meta shop-meta">

                                  <ul class="list-inline list-unstyled">

                                    <li> <a href="javascript:;"> <span class="fa fa-blog-time"></span><?php echo coupon_remaining_time( $expire_timestamp ); ?></a> </li>

                                    <li> <span class="fa fa-tilted-sep"></span> </li>

                                    <?php /*?><li> <a href="<?php echo esc_url( coupon_get_label_link( $shop_id, $code->ID ) ); ?>"> <span class="fa fa-coupon"></span><?php echo coupon_label( $code->ID ); ?> </a> </li>

<li> <span class="fa fa-tilted-sep"></span> </li><?php */?>

                                    <li> <a href="#_" class="info pop-over" data-title="<b><?php esc_attr_e( 'Conditions', 'coupon' ); ?></b>" data-content="<p><?php echo esc_attr( $code_conditions ); ?></p>"> <span class="fa fa-conditions"></span>

                                      <?php _e( 'Conditions', 'coupon' ); ?>

                                      </a> </li>

                                    <li> <span class="fa fa-tilted-sep"></span> </li>

                                    <li>

                                      <?php

$has_ratings = coupon_get_option( 'code_dailly_ratings' );

if( in_array( 'code', $has_ratings ) ){

echo coupon_get_ratings( $code->ID );

}

?>

                                    </li>

                                  </ul>

                                </div>

                              </div>

                            </div>

                          </div>

                          <!-- .coupon-box-promo-title --> 

                          <!-- coupon-box-button-green --> 

                          <!-- coupon-box-button-replace -->

                          <div class="row">

                            <div class="col-md-12">

                              <?php if( ( $coupon_label == 'coupon' && ( !empty( $code_couponcode) || !empty( $code_api ) ) ) || ( $coupon_label == 'discount' && !empty( $code_api ) ) ):  ?>

                              <?php if((isset($_GET['codeid']) && !empty($_GET['codeid'])) && ($_GET['codeid'] == $code_id)):

$reqcode = $_GET['codeid'];

?>

                              <p class="btn-custom view-all btn-shop btn-default btn-lg show-code btn-padding open btn-full code-shown" style="position:relative; z-index:-20;" > <span class="selection-code"><?php echo $code_couponcode; ?></span> </p>

                              <?php else: ?>

                              <a data-code="<?php echo $code_couponcode; ?>" href="<?php echo !empty( $code_api ) ? esc_url( $code_api ) : ''; ?>" onclick="window.open('?codeid=<?php echo $code_id; ?>','_blank');window.open(this.href,'_self');" class="btn btn-custom btn-full <?php echo ( empty( $code_couponcode )|| $coupon_label == 'discount' ) ? '' : '' ?> btn-shop view-all btn-default btn-lg <?php echo ( !empty( $code_couponcode ) && $coupon_label == 'coupon' ) ? 'show-code' : '' ?>" data-codeid="<?php echo $code->ID; ?>">

                              <?php

if( !empty( $code_couponcode ) && $coupon_label == 'coupon' ){

echo coupon_get_option( 'show_code_text' );

}

else if( empty( $code_couponcode ) && $coupon_label == 'coupon' ){

echo coupon_get_option( 'pack_open_text' );

}

else{

echo coupon_get_option( 'check_discount_text' );

}

?>

                              </a>

                              <?php endif; ?>

                              <span class="fold"></span>

                              <?php endif; ?>

                            </div>

                          </div>

                        </div>

                        <!-- .coupon-box-content --> 

                      </div>

                      <!-- .row --> 

                    </div>

                  </div>

                  <!-- .coupon-box-1 -->

                  <?php

if((isset($_GET['codeid']) && !empty($_GET['codeid'])) && ($_GET['codeid'] == $code_id)){

$code = $_GET['codeid'];

?>

                  <script type="text/javascript">

jQuery(document).ready(function ($) { 

getCode(<?= $code ?>);	

});

function getCode(codeid){	

var codelink =$('.coupon-content a[data-codeid="'+ codeid +'"]');

$.ajax({

url: ajaxurl,

data:{

action: 'ajax_code',

codeid: codeid

},

dataType: "JSON",

method: "POST",

success: function(response){

if( !response.error ){

$('.modal_discount').html( response.code_discount );

$('.modal_code_text').html( response.code_text );

$('.modal_discount').html( response.code_discount );

$('.modal_expiry').html('<a href="#"><span class="fa fa-blog-time modal_expiry"></span>'+ response.expiry +'</a>'  );

$('.modal_conditions').attr("data-content",response.code_conditions);

$('.modal_ratings').html(response.ratings);

$('.modal_ratings .item-ratings .pull-right').css('cssText','float:left !important');

$('.modal_label').html('<a href="#"><span class="fa fa-coupon"></span>'+response.coupon_label +'</a>');

$('.modal_title').html( response.title );

$('.modal_text').html( response.text );

$('.modal_code .code').html(response.code);

$('.modal_meal').html(response.code_meals);

$('.site_link').html('<a href="'+ response.code_websiteurl +'" target="_blank">Go to '+ response.code_domain +'  and paste the code at checkout</a>');

}

$('#showCode').modal('show');

},

error: function(){

},

complete: function(){

}

});

}

</script>

                  <?php } 

}

?>

                </div>

                <?php endif; ?>

              </div>

            </div>

            <?php endif; ?>

            <?php if( in_array( 'featured', $show_in_listings ) ): ?>

            <div class="tab-pane fade <?php echo $tab == 'featured' ? 'in active' : ''; ?>" id="featured">

              <div class="featured-container col-md-12">

                <?php if( $featured->have_posts() ): $counter = 0;?>

                <div class="row clipping-v3">

                  <?php 

while( $featured->have_posts() ){

$featured->the_post();

include( locate_template( 'includes/code_list_loop.php' ) );

}

?>

                </div>

                <!-- pagination -->

                <?php if( !empty( $featured_pagination ) ): ?>

                <!-- pagination -->

                <div class="row">

                  <div class="blog-pagination col-md-12">

                    <ul class="pagination">

                      <?php echo $featured_pagination; ?>

                    </ul>

                  </div>

                </div>

                <!-- .pagination -->

                <?php endif; ?>

                <?php endif; ?>

              </div>

            </div>

            <?php endif; ?>

            <?php if( in_array( 'popular', $show_in_listings ) ): ?>

            <div class="tab-pane fade <?php echo $tab == 'popular' ? 'in active' : ''; ?>" id="popular">

              <div class="featured-container col-md-12">

                <?php if( $popular->have_posts() ): $counter = 0;?>

                <div class="row clipping-v3">

                  <?php 

while( $popular->have_posts() ){

$popular->the_post();

include( locate_template( 'includes/code_list_loop.php' ) );

}

?>

                </div>

                <?php if( !empty( $popular_pagination ) ): ?>

                <!-- pagination -->

                <div class="row">

                  <div class="blog-pagination col-md-12">

                    <ul class="pagination">

                      <?php echo $popular_pagination; ?>

                    </ul>

                  </div>

                </div>

                <!-- .pagination -->

                <?php endif; ?>

                <?php endif; ?>

              </div>

            </div>

            <?php endif; ?>

            <?php if( in_array( 'newest', $show_in_listings ) ): ?>

            <div class="tab-pane fade <?php echo $tab == 'newest' ? 'in active' : ''; ?>" id="newest">

              <div class="featured-container col-md-12">

                <?php if( $newest->have_posts() ): $counter = 0;?>

                <div class="row clipping-v3">

                  <?php 

while( $newest->have_posts() ){

$newest->the_post();

include( locate_template( 'includes/code_list_loop.php' ) );

}

?>

                </div>

                <?php if( !empty( $newest_pagination ) ): ?>

                <!-- pagination -->

                <div class="row">

                  <div class="blog-pagination col-md-12">

                    <ul class="pagination">

                      <?php echo $newest_pagination; ?>

                    </ul>

                  </div>

                </div>

                <!-- .pagination -->

                <?php endif; ?>

                <?php endif; ?>

              </div>

            </div>

            <?php endif; ?>

          </div>

          <!-- .tab-content -->

          <div class="clearfix"></div>

        </div>

        <!-- .row --> 

      </div>

      <!-- .featured-boxes --> 

      <!-- sidebar -->

      <div class="coupon_list_sidebar col-md-3"> 

        <!-- recommended-widget -->

        <div class="caption widget-caption" style="border: 0px none; margin-top: -50px;">

          <h4  style="font-weight: normal; text-align: center; font-size: 16px;">

            <?php _e( 'Hand-picked Deals by', 'coupon' ); ?>

          </h4>

        </div>

        <div class="widget" style="padding: 0px; margin-top:0px;">

          <div class="blog-inner widget-inner" style="background-color: rgb(250, 250, 250);">

            <div class="line-divider widget-line-divider"></div>

            <?php

/* gte author meta */

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

            <div class="logotype">

              <?php if( !empty( $avatar ) ): ?>

              <!-- avatar-image -->

              <div class="logotype-image" style="background:url(<?php echo esc_url( $avatar ); ?>) no-repeat scroll 0 0 / cover;"> 

                <!--<div class="logotype-image" style="background:url(<?php echo esc_url( $img_data['src'] ); ?>) no-repeat scroll center 0 / contain;">--> 

              </div>

              <!-- .avatar-image -->

              <?php endif; ?>

            </div>

            <div class="authorname"> <?php echo get_the_author_meta('first_name').' '.get_the_author_meta('last_name'); ?>

              <?php //echo $mTitle; ?>

              <span class="sep"></span> </div>

            <div class="hpicktext"> I am here to save you money by handpicking <a class="loadMore" style="color: red; cursor: pointer;">...more</a> <span class="loadSpan" style="display: none;">the best deals at Links of London</span> <a class="loadLess" style="color: red; cursor: pointer; display:none;">...show less</a></div>

            <!-- .profile --> 

          </div>

          <div class="clearfix"></div>

        </div>

        <hr class="mdline">

        <!-- .recommended-widget -->

        <?php get_sidebar( 'right' ); ?>

      </div>

      <!-- .sidebar --> 

    </div>

    <!-- .row -->

    <hr style="margin: 1px 0px; border-color: rgb(168, 168, 168);">

  </div>

  <!-- .container --> 

</section>

<!-- .top20 --> 

<script type="text/javascript">

jQuery(document).ready(function ($) { 

$('.featured-item-container').hover(function(){

// $( this).find('.hover_logo' ).fadeTo( "slow",0.12	);

// $( this).find('.logotype .logotype-image' ).fadeIn( "slow");

// $( this).find('.coupon-content .shop-meta .list-inline').css('visibility','visible');

// $( this).find('.shop-meta.meals span').css('visibility','visible');

$(this).find('.fa-star').toggleClass('fa-star fa-star-red');

$(this).find('.fa-star-o').toggleClass('fa-star-o fa-star-red-o');

$(this).find('.fa-star-half-o').toggleClass('fa-star-half-o fa-star-red-half-o');

},

function() {

// $( this).find('.logotype .logotype-image' ).fadeOut( "slow");

// $( this).find('.hover_logo' ).fadeTo( "slow", 10 );

// $( this).find('.coupon-content .shop-meta .list-inline').css('visibility','hidden');

// $( this).find('.shop-meta.meals span').css('visibility','hidden');

$(this).find('.fa-star-red').toggleClass('fa-star-red fa-star');

$(this).find('.fa-star-red-o').toggleClass('fa-star-red-o fa-star-o');

$(this).find('.fa-star-red-half-o').toggleClass('fa-star-red-half-o fa-star-half-o');



}

);





jQuery(document).ready(function(e) {

	jQuery('.clipping .coupon-box, .clipping-v2 .coupon-box, .clipping-v3 .coupon-box').each(function(){

		var nwh = jQuery(this).find('div.blog-single-content').css('height');

		jQuery(this).find('div.coupon-inner').css('height',nwh);

	})

});



jQuery('.filter-tabs ul li a').click(function(){

	var ttw = jQuery(this).attr('href');

	//alert(ttw);

	setTimeout(function(){

	jQuery(ttw+' .coupon-box').each(function(){

		//alert(jQuery(this).attr('class'));

		var nwh = jQuery(this).find('div.blog-single-content').css('height');

		jQuery(this).find('div.coupon-inner').css('height',nwh);

	})

	},200);

});



jQuery('.coupHov').mouseenter(function(){

	if(jQuery(this).parent('div').find('div.meals').length > 0){

		jQuery(this).parent('div').find('div.meals').css('display','block');

	}else{

		jQuery(this).parent('a').parent('div').parent('div').find('div.meals').css('display','block');

	}

})

jQuery('.meals').mouseleave(function(){

	jQuery(this).css('display','none');

})

jQuery('.shop-promo-title').mouseenter(function(){

	jQuery(this).parent('div').parent('div').find('div.meals').css('display','none');

})

});</script>

<?php

get_template_part( 'includes/shop_carousel' );

get_footer();



?>

