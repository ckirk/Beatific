<div class="meals container">



	<div class="grid">



    <div class="row">



    



        



            



        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="padding:14px 0; display: inline-flex; width: auto;">



					



						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 meals">Total meals</br> served to date</div>



						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 meal_value">



						<?php



						$number = esc_attr( coupon_get_option( 'total_meals_served' ) );



						echo ($number)?number_format($number):0; ?>



						</div>



									



		</div>



        <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 col-sm-push-3 col-md-push-6  col-lg-push-6">



				<div class="time" style="overflow: hidden;">



					<span class="fa fa-clock-custom-big pull-left"> </span>



					<span class="campaignends">



					<?php



						$expire_timestamp = strtotime(esc_attr(coupon_get_option( 'campaign_expire')),time());



						$remaining = coupon_remaining_time($expire_timestamp);



						echo ($remaining == 0)?' <span class="orangetxt">Campaign Expired</span>':'Campaign ends in <span class="orangetxt">'.$remaining.'</span>';



					?>



					</span>



					<!--<div class="countdown styled"></div>-->



				</div>



		</div>



		



		<div style="width:auto;" class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-pull-3 col-lg-pull-3">



		<?php 



			



				$goal=(esc_attr( coupon_get_option( 'meals_goal_week' ) ))?esc_attr( coupon_get_option( 'meals_goal_week' ) ):0;



				$goal_served=(esc_attr( coupon_get_option( 'meals_served_week' ) ))?esc_attr( coupon_get_option( 'meals_served_week' ) ):0;



				$perc=($goal_served/$goal)*100;



			



			?>



				<div class="row">



					<div href="#" class="should">



                      



                       <div class="col-md-12 progress_bar">



						<div class="meal_goal col-md-5 col-lg-5 col-sm-5 col-xs-12">



						This weeks goal <strong><?php echo $goal; ?> </strong>meals



						</div>



						<div  style="padding:0; width:auto;" class="col-md-7 col-lg-7 col-sm-7 col-xs-12">



						   <span class="meal-arrow pull-left" style="padding: 5px 0px 5px 15px; margin:0;"><i class="fa fa-arrow-right"></i></span>				   



						   <span class="pull-left green"> <?php echo $goal_served; ?></span>





						  <div class="progress pull-left">



								<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $perc; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc; ?>%">



								  <span class="sr-only"><?php echo $perc; ?>% Complete</span>



								</div>



							  </div>



						<span class="pull-left green"> <?php echo $goal; ?></span>	 



						</div>



					</div>



                     



                       <div id="gowl" class="cotw">



                      



                       <div class="week">



                       <?php dynamic_sidebar( 'causeweek' ); ?>	



                       </div>



                       



                       <div class="hope">



                         <?php dynamic_sidebar( 'charity' ); ?>



                       </div>



                       



                       <div class="helps">



                       <?php dynamic_sidebar( 'showhope' ); ?>



                       </div>



                      </div>



                     



                  </div>



                    



                    



				</div>



		</div>



		



    </div>



</div>



	



	



			



	</div>