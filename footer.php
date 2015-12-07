<!-- =====================================================================================================================================

													F O O T E R

====================================================================================================================================== -->

<?php get_sidebar(); ?>



<!-- =====================================================================================================================================

													C O P Y R I G H T S

====================================================================================================================================== -->



<!-- copyrights -->



<section class="copyright">



	<!-- container -->



	<div class="container">



		<!-- row -->



		<div class="row">

			<div class="footer-nav col-md-4 pull-left">

            <div class="copy_rights">Copyright @ <?=date('Y')?></div>

            </div>

			<!-- bottom-nav -->



			<div class="footer-nav col-md-8 pull-right">



				<nav class="navbar navbar-default collapsed bottom-nav" role="navigation">



					<!-- Collect the nav links, forms, and other content for toggling -->



					<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">					



						<ul class="nav navbar-nav">



							<?php



							if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'top-navigation' ] ) ) {



								wp_nav_menu( array(



									'theme_location'  	=> 'top-navigation',



									'menu_class'        => 'nav navbar-nav',



									'echo'          	=> true,



									'container'			=> false,



									'items_wrap'        => '%3$s',



									'depth'         	=> 1,



									'walker' 			=> new coupon_walker



								) );



							}



							?>



						</ul>



					</div>



				</nav>



				<!-- .navbar-collapse -->



			</div>



			<!-- .bottom-nav -->







		</div>



		<!-- .row -->



	</div>



	<!-- .container -->







</section>



<!-- .copyrights -->



<!-- =====================================================================================================================================



													M O D A L



====================================================================================================================================== -->



<!-- modal -->



<div class="coupon-box modal fade in" id="showCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">



	<div class="modal-dialog modal-sm modal-lg">



		<div class="modal-content showCode-content">



			<div class="modal-header">



				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>







						<!-- coupon-box-content -->



							<div class="item-meta blog-meta shop-meta">







								<ul class="list-inline list-unstyled">



									<li class="modal_expiry"></li>



									<li>



										<span class="fa fa-tilted-sep"></span>



									</li>



									<li class="modal_label"></li>



									<li>



										<span class="fa fa-tilted-sep"></span>



									</li>



									<li>



										<a href="#" class="modal_conditions info pop-over" data-title="<b>Conditions</b>" data-content="<p></p>">



										<span class="fa fa-conditions"></span>Conditions</a>



									</li>



									<li>



										<span class="fa fa-tilted-sep"></span>



									</li>



									<li class="modal_ratings"></li>



								</ul>







							</div>







			</div>



			<div class="modal-body">	



				<div class="row code-d">	



					<!-- coupon-box-discount -->



					<div class="special-item col-md-3">



							<div class="special-item-inner coupon-inner orange">



								<!--<h2 class="modal_discount"></h2>



								<h4 class="modal_code_text"></h4>



-->



							</div>										



							<div class="separator">123</div>



                            <?php if(coupon_get_option( 'display_meals' ) > 0){?>



                            		<span class="modal_meal meal_number">3</span> &nbsp;<em>meals</em>



                            <?php } else {  ?>      



                            		<span class="m-num">0 &nbsp; <em>meals</em>  </span>



							<?php } ?>		



					</div>



					<!-- .coupon-box-discount -->



					



					<div class="blog-single-content coupon-content col-md-8">







						<!-- coupon-box-promo-title -->



						<div class="shop-promo-title">



							<h4 class="modal_title" ></h4>



							<span class="sep"></span>



							<span class="modal_text"></span>



						</div>



						<!-- .coupon-box-promo-title -->







						<!-- coupon-box-button-green -->







						<!-- coupon-box-button-replace -->



						



					</div>



					<!-- .coupon-box-content -->



				</div>



				<?php if(coupon_get_option( 'display_meals' ) > 0){?>                



				<div class="col-md-12 shop-meta meals">



					<span class="fa fa-meal"></span>



					<span class="fa fa-arrow-right"></span>



					<span class="modal_meal meal_number">3</span> &nbsp;Meals will be provided when you make a purchase. 



                </div>



				<?php }?>



			</div>



			



			<!-- .foot -->



			<div class="modal-footer">



				<div class="view-all code-shown item-meta">



					<div class="modal-code col-md-12">



						<!-- coupon-box-button-replace -->



						<p data-toggle="modal" class="modal_code">



						<span class="code pull-left"></span>



						<span class="code_copied pull-right">



						<span class="fa fa-check"></span>



						Code is copied</span>



						</p>



						<a href="javascript:void(0)">



                        <p data-toggle="modal" class="modal_paste_code">



							<span class="site_link"></span></p>



                        </a>



						<!-- .coupon-box-button-replace -->



					</div>



				</div>



			</div>



		</div>



	</div>



</div>



<!-- .modal -->



<!-- modal -->



<div class="coupon-box how modal fade in" id="how" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">



	<div class="modal-dialog">



		<div class="modal-content showCode-content">



			<div class="modal-header" style="padding: 0px; border: 0px none; margin-top: -12px;">



				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>



			</div>



			<div class="modal-body" style="padding:0;">	



				<div class="row">	



					<div class="col-md-12">



						<img src="<?php echo get_bloginfo('template_directory');?>/images/howitworks001.jpg" class="img-responsive" />



					</div>



				</div>



			</div>



		</div>



	</div>



</div>



<div class="howitworks" data-toggle="modal" data-target="#how">How to use a coupon...</a></div>



<!-- .modal -->







<?php wp_footer() ?>

<script language="javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-confirm.js"></script>

<script language="javascript">



	jQuery(document).ready(function(e) {



		jQuery( '.coupon-content' ).each(function( index ) {



        	if(jQuery(this).length > 0){



				var hei = jQuery(this).find('.shop-promo-title p').height();



				



				var linsss = hei/17;



				var topp = (linsss - 1) * 4;



				



				jQuery(this).parent('div').find('.coupon-inner').css('margin-top',topp+'%');	



			}



		})



    });



</script>



<script type="text/javascript">



		jQuery(document).ready(function(e) {



			 jQuery( ".services-a" ).on('click',function() {

			 	jQuery(this).parent('span').parent('h4').parent('div').find(".l-selection").slideToggle(400);

				

				//alert(jQuery(this).closest('div').parent('div.blog-single-content').length);

				var tttt = jQuery(this);

				setTimeout(function(){

					if(tttt.closest('div').parent('div.blog-single-content').parent('div').find('div.coupon-inner').length > 0){

						var nwh2 = tttt.closest('div').parent('div.blog-single-content').css('height');

						tttt.closest('div').parent('div.blog-single-content').parent('div').find('div.coupon-inner').css('height',nwh2);

					}

				},400);

				

			 }); 

			 

			jQuery('.loadMore').click(function(){

				jQuery(this).css('display','none');

				jQuery(this).parent('div').find('.loadLess').css('display','inline');

				jQuery(this).parent('div').find('span.loadSpan').css('display','inline');	

			})

			

			jQuery('.loadLess').click(function(){

				jQuery(this).css('display','none');

				jQuery(this).parent('div').find('.loadMore').css('display','inline');

				jQuery(this).parent('div').find('span.loadSpan').css('display','none');	

			})

			

			//////////////////////////////////////////////// filter

			

			jQuery('.filter').mouseleave(function(){

				jQuery(this).find('.ajax_search').val('');

				jQuery(this).find('.ajax_search_results ul.list-unstyled').html('<ul></ul>');

			})

		});

		

		<!--pop smile face-->		

		/*jQuery('.dataConfirm').on('click', function () {

		   $.confirm({

				title: 'Every child life matter',

				icon: '',

				animation: 'scale',

				columnClass: 'col-md-4 col-md-offset-4',

				confirm: function () {

					$.confirm({

					   title: 'How it works',

						content: 'url:http://beatific.co/form.php',

						columnClass: 'col-md-6 col-md-offset-3',

						confirm: function () {

							var input = this.$b.find('input#input-name');

							var errorText = this.$b.find('.text-danger');

							if (input.val() == '') {

								errorText.show();

								return false;

							} else {

								alert('Hello ' + input.val());

							}

						}

					});

				}

			});

		});

		jQuery(document).ready(function(e) {

			jQuery('.dataConfirm1').bind('click', function () {

		   $.confirm({

				title: 'Every child life matter',

				icon: '',

				animation: 'scale',

				columnClass: 'col-md-4 col-md-offset-4',

				confirm: function () {

					$.confirm({

					   title: 'How it works',

						content: 'url:http://beatific.co/form.php',

						columnClass: 'col-md-6 col-md-offset-3',

						confirm: function () {

							var input = this.$b.find('input#input-name');

							var errorText = this.$b.find('.text-danger');

							if (input.val() == '') {

								errorText.show();

								return false;

							} else {

								alert('Hello ' + input.val());

							}

						}

					});

				}

			});

		});

        });*/

</script>



</body>



</html>