<?php
/**
 * Wishlist page template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.0
 */

/* Note: This file has been altered by Laborator */

?>

<form id="yith-wcwl-form" action="<?php echo esc_url( YITH_WCWL()->get_wishlist_url( 'view' . ( $wishlist_meta['is_default'] != 1 ? '/' . $wishlist_meta['wishlist_token'] : '' ) ) ) ?>" method="post">
	<!-- TITLE -->
	<?php
	do_action( 'yith_wcwl_before_wishlist_title' );

	if( ! empty( $page_title ) ) :

		?>
		<div class="page-title">
			<h2>
				<?php echo apply_filters( 'yith_wcwl_wishlist_title', $page_title ); ?>
				<small><?php _e('Your favorite list of products', 'aurum'); ?></small>
			</h2>
		</div>
		<?php

	endif;

	 do_action( 'yith_wcwl_before_wishlist' ); ?>

	<!-- WISHLIST TABLE -->
	<table class="shop_table cart wishlist_table view-cart" cellspacing="0" data-pagination="<?php echo esc_attr( $pagination )?>" data-per-page="<?php echo esc_attr( $per_page )?>" data-page="<?php echo esc_attr( $current_page )?>" data-id="<?php echo esc_attr( $wishlist_meta['ID'] )?>">
		<thead>
		<tr>

			<th class="product-name">
				<span class="nobr"><?php echo apply_filters( 'yith_wcwl_wishlist_view_name_heading', __( 'Product', 'yit' ) ) ?></span>
			</th>

			<th></th>

			<?php if( $show_stock_status ) : ?>
				<th class="product-stock-stauts">
					<span class="nobr">
						<?php echo apply_filters( 'yith_wcwl_wishlist_view_stock_heading', __( 'Stock Status', 'yit' ) ) ?>
					</span>
				</th>
			<?php endif ?>

			<?php if( $show_add_to_cart ) : ?>
				<th class="product-add-to-cart product-subtotal">
					<?php _e( 'Add to Cart', 'yith' ); ?>
				</th>
			<?php endif ?>
		</tr>
		</thead>

		<tbody>
		<?php
		if( count( $wishlist_items ) > 0 ) :
			foreach( $wishlist_items as $item ) :
				global $product;
				if( function_exists( 'wc_get_product' ) ) {
					$product = wc_get_product( $item['prod_id'] );
				}
				else{
					$product = get_product( $item['prod_id'] );
				}

				if( $product !== false && $product->exists() ) :
					$availability = $product->get_availability();
					$stock_status = $availability['class'];
					?>
					<tr id="yith-wcwl-row-<?php echo $item['prod_id'] ?>" data-row-id="<?php echo $item['prod_id'] ?>">


						<td class="item-image">

							<?php if( $is_user_owner ): ?>
								<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>" class="remove remove_from_wishlist remove-item" title="<?php _e( 'Remove this product', 'yit' ) ?>">&times;</a>
							<?php endif; ?>

							<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>">
								<?php echo $product->get_image('shop-thumb-2') ?>
							</a>
						</td>

						<td class="product-name">
							<h3>
								<a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></a>
							</h3>

					   		 <?php if( $show_price ) : ?>
								<span class="price">
									<?php
									if( $product->price != '0' ) {
										$wc_price = function_exists('wc_price') ? 'wc_price' : 'woocommerce_price';

										if( $price_excl_tax ) {
											echo apply_filters( 'woocommerce_cart_item_price_html', $wc_price( $product->get_price_excluding_tax() ), $item, '' );
										}
										else {
											echo apply_filters( 'woocommerce_cart_item_price_html', $wc_price( $product->get_price() ), $item, '' );
										}
									}
									else {
										echo apply_filters( 'yith_free_text', __( 'Free!', 'yit' ) );
									}
									?>
								</span>
							<?php endif ?>

						</td>


						<?php if( $show_stock_status ) : ?>
							<td class="product-stock-status">
								<?php
								if( $stock_status == 'out-of-stock' ) {
									$stock_status = "Out";
									echo '<span class="wishlist-out-of-stock">' . __( 'Out of Stock', 'yit' ) . '</span>';
								} else {
									$stock_status = "In";
									echo '<span class="wishlist-in-stock">' . __( 'In Stock', 'yit' ) . '</span>';
								}
								?>
							</td>
						<?php endif ?>

						<?php if( $show_add_to_cart ) : ?>
							<td class="product-add-to-cart">
								<?php if( isset( $stock_status ) && $stock_status != 'Out' ): ?>

									<?php
									# start: modified by Arlind Nushi
									get_template_part('tpls/yith-add-to-cart');
									# end: modified by Arlind Nushi
									?>
								<?php endif ?>
							</td>
						<?php endif ?>
					</tr>
				<?php
				endif;
			endforeach;
		else: ?>
			<tr class="pagination-row">
				<td colspan="6" class="wishlist-empty"><?php _e( 'No products were added to the wishlist', 'yit' ) ?></td>
			</tr>
		<?php
		endif;

		if( ! empty( $page_links ) ) : ?>
			<tr>
				<td colspan="6"><?php echo $page_links ?></td>
			</tr>
		<?php endif ?>
		</tbody>

		<?php if( $is_user_logged_in ): ?>
			<tfoot>
			<tr>
				<?php if ( $is_user_owner && $wishlist_meta['wishlist_privacy'] != 2 && $share_enabled ) : ?>
					<td colspan="<?php echo ( $is_user_logged_in && $is_user_owner && $show_ask_estimate_button && $count > 0 ) ? 4 : 6 ?>">
						<?php yith_wcwl_get_template( 'share.php', $share_atts ); ?>
					</td>
				<?php endif; ?>

				<?php
				if ( $is_user_owner && $show_ask_estimate_button && $count > 0 ): ?>
					<td colspan="<?php echo ( $is_user_owner && $wishlist_meta['wishlist_privacy'] != 2 && $share_enabled ) ? 2 : 6 ?>">
						<a href="<?php echo $ask_estimate_url ?>" class="btn button ask-an-estimate-button">
							<?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', '<i class="fa fa-shopping-cart"></i>' )?>
							<?php _e( 'Ask an estimate of costs', 'yit' ) ?>
						</a>
					</td>
				<?php
				endif;

				do_action( 'yith_wcwl_after_wishlist_share' );
				?>
			</tr>
			</tfoot>
		<?php endif; ?>

	</table>

	<?php wp_nonce_field( 'yith_wcwl_edit_wishlist_action', 'yith_wcwl_edit_wishlist' ); ?>

	<?php if( $wishlist_meta['is_default'] != 1 ): ?>
		<input type="hidden" value="<?php echo $wishlist_meta['wishlist_token'] ?>" name="wishlist_id" id="wishlist_id">
	<?php endif; ?>

	<?php do_action( 'yith_wcwl_after_wishlist' ); ?>
</form>