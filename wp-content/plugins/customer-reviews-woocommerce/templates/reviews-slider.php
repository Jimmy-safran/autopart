<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="cr-reviews-slider" id="<?php echo $id; ?>" data-slick='<?php echo wp_json_encode( $slider_settings ); ?>' style="<?php echo esc_attr( $section_style ); ?>">
	<?php foreach ( $reviews as $i => $review ):
		$rating = intval( get_comment_meta( $review->comment_ID, 'rating', true ) );
		if( 'yes' === get_option( 'ivole_verified_links', 'no' ) ) {
			$order_id = intval( get_comment_meta( $review->comment_ID, 'ivole_order', true ) );
		} else {
			$order_id = 0;
		}
		$country = get_comment_meta( $review->comment_ID, 'ivole_country', true );
		$country_code = null;
		if( is_array( $country ) && isset( $country['code'] ) ) {
			$country_code = $country['code'];
		}
		$author = get_comment_author( $review );
	?>
		<div class="cr-review-card">
			<div class="cr-review-card-inner" style="<?php echo esc_attr( $card_style ); ?>">
				<div class="top-row">
					<?php
					$avtr = get_avatar( $review, 56, '', esc_attr( $author ) );
					if( $avatars && $avtr ): ?>
						<div class="review-thumbnail">
							<?php echo $avtr; ?>
						</div>
					<?php endif; ?>
					<div class="reviewer">
						<div class="reviewer-name">
							<?php
							echo esc_html( $author );
							if( $country_code ) {
								echo '<img src="' . plugin_dir_url( dirname( __FILE__ ) ) . 'img/flags/' . $country_code . '.svg" class="ivole-grid-country-icon" width="20" height="15" alt="' . $country_code . '">';
							}
							?>
						</div>
						
						
					</div>
				</div>
				<div class="rating-row">
					<div class="rating">
						<div class="crstar-rating-svg" role="img" aria-label="<?php echo esc_attr( sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating ) ); ?>"><?php echo CR_Reviews::get_star_rating_svg( $rating, 0, '' ); ?></div>
					</div>
					
				</div>
				<div class="purchasing_row">
					<div>
						<?php echo 'Purchased on:'; ?>
					</div>
					<div>
						<?php
							$datetime_object = new DateTime($review->comment_date);

							// Format the DateTime object to display only the date (YYYY-MM-DD)
							
							echo 'Leave a review on' . ' ' . $datetime_object->format('Y-m-d');
							
						?>
					</div>
				</div>
				<?php
					do_action( 'cr_slider_before_review_text', $review );
				?>
				
				<?php
				if ( $incentivized_label ) :
					$coupon_code = get_comment_meta( $review->comment_ID, 'cr_coupon_code', true );
					if ( $coupon_code ) :
				?>
					<div class="cr-incentivized-row">
						<?php
							$incentivized_badge_icon = '<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="cr-incentivized-svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15l6 -6" /><circle cx="9.5" cy="9.5" r=".5" fill="currentColor" /><circle cx="14.5" cy="14.5" r=".5" fill="currentColor" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /></svg>';
							$incentivized_badge_content = '<span class="cr-incentivized-icon">' . $incentivized_badge_icon . '</span>' . esc_html( $incentivized_label );
							echo '<div class="cr-incentivized-badge">' . $incentivized_badge_content . '</div>';
						?>
					</div>
				<?php
					endif;
				endif;
				?>
				<?php if ( $show_products && $product = wc_get_product( $review->comment_post_ID ) ):
					if( 'publish' === $product->get_status() ):
						?>
						<div class="review-product" style="<?php echo esc_attr( $product_style ); ?>">
							<div class="product-thumbnail">
								<?php echo $product->get_image( 'woocommerce_gallery_thumbnail' ); ?>
							</div>
							<div class="product-title">
								<?php if ( $product_links ): ?>
									<?php echo '<a href="' . esc_url( get_permalink( $product->get_id() ) ) . '">' . $product->get_title() . '</a>'; ?>
								<?php else: ?>
									<?php echo '<span>' . $product->get_title() . '</span>'; ?>
								<?php endif; ?>
							</div>
						</div>
						<?php
					endif;
				endif;
				?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
