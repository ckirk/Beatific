<div class="shop_campaign_content">

									<?php 

											

										$goal=(esc_attr( coupon_get_option( 'meals_goal_week' ) ))?esc_attr( coupon_get_option( 'meals_goal_week' ) ):0;

										$goal_served=(esc_attr( coupon_get_option( 'meals_served_week' ) ))?esc_attr( coupon_get_option( 'meals_served_week' ) ):0;

										$perc=($goal_served/$goal)*100;

											

									?>

									<div class="meal_goal">This week's goal <strong><?php echo $goal; ?> </strong>meals</div>

									<div class="progress_bar">

										<span class="green" <?php /*?>style="padding: 0px 10px 0px 0px;"<?php */?>> <?php echo $goal_served; ?></span>

												

										<div class="progress">

												<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $perc; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc; ?>%">

												<span class="sr-only"><?php echo $perc; ?>% Complete</span>

												</div>

										</div>

										<span class="green"> <?php echo $goal; ?></span>		 

									</div>								

									<div class="time_left">

										<div class="clock icon pull-left">

											<img class="img-responsive" src="<?php echo get_bloginfo('template_directory');?>/images/clock.gif" />

										</div>

										<div class="time pull-left">

											<?php

											$expire_timestamp = strtotime(esc_attr(coupon_get_option( 'campaign_expire')),time());

											$remaining = coupon_remaining_time($expire_timestamp);

											echo ($remaining == 0)?' <span class="orangetxt">Campaign Expired</span>':'Campaign ends in <span class="orangetxt">'.$remaining.'</span>';

											?> 

										</div>

									</div>

								</div>