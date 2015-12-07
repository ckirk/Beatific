<?php
/*
	Template Name: Categories
*/
get_header();
the_post();
get_template_part( 'includes/inner_header' );
?>
<section class="categories">

	<div class="container">
		<div class="row">
			<?php
			$order_by = coupon_get_option( 'category_order_by' );
			$order = coupon_get_option( 'category_order' );
			$order_by = !empty( $order_by ) ? $order_by : 'name';
			$order = !empty( $order ) ? $order : 'ASC';
			
			$parents = get_terms( 'code_category', array( 'hide_empty' => 0, 'parent' => 0, 'orderby' => $order_by, 'order' => $order ) );
			if( !empty( $parents ) ){
				foreach( $parents as $parent ){
					?>
					<div class="col-md-12">
						<div class="caption category-caption">
							<h2><?php echo $parent->name; ?></h2>
						</div>
					</div>
					<?php
					$counter = 0;
					$children = get_terms( 'code_category', array( 'hide_empty' => 0, 'parent' => $parent->term_id, 'orderby' => $order_by, 'order' => $order ) );
					if( !empty( $children ) ){
						?>
						<div class="category-row col-md-12">
							<div class="row">						
							<?php
						
							foreach( $children as $child ){
								if( $counter == 4 ){
									$counter = 0;
									?>
									</div>
									</div><span class="horizontal"></span>
									<div class="category-row col-md-12">
									<div class="row">
									<?php
								}
								$counter++;
								$term_meta = get_option( "taxonomy_".$child->term_id );
								$icon = !empty( $term_meta['category_icon'] ) ? $term_meta['category_icon'] : '';
								?>
								
								<!-- element-column -->
								
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
										<h3><?php echo $child->name ?></h3>
									</a>
								</div>
								<?php if( $counter < 4  ){ ?>
								<div class="border-sep special-item col-md-1 col-sm-12" style="margin-right: 0px;width: 1px; border-right: 1px solid #f5f5f5; padding: 0px; height: 55px; margin-top: 8%;">
									&nbsp;
								</div>
								<?php } ?>
								<!-- .element-column -->
							<?php
							}
							?>
						</div>
						</div>
					<?php
					}
					?>					
				<?php
				}
			}
			?>

		</div>
	</div>

</section>
<?php
get_template_part( 'includes/shop_carousel' );
get_footer();
?>