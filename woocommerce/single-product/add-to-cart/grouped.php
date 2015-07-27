
<?php
/**
 * Grouped product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $post;

$parent_product_post = $post;
$counter = 0;
$morningOutput = false;
$afternoonOutput = false;

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="cart" method="post" enctype='multipart/form-data'>
	<table cellspacing="0" class="group_table">
        <thead>
        </thead>
        <tbody>
			<?php
				foreach ( $grouped_products as $product_id ) :
					$product = wc_get_product( $product_id );

					if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) && ! $product->is_in_stock() ) {
						continue;
					}

					$post    = $product->post;
					setup_postdata( $post );

                    if($product->get_attribute('session') == "Morning" && $morningOutput == false){
                        $morningOutput = true
                        ?>
                            <tr class="timeDivider">
                               <td colspan="3">Morning</td> 
                            </tr>
                        <?php
                    }else if($product->get_attribute('session') == "Afternoon" && $afternoonOutput == false){
                        $afternoonOutput = true
                                               ?>
                            <tr class="timeDivider">
                               <td colspan="3">Afternoon</td> 
                            </tr>
                        <?php
                    }
                    
                      ?>              

					<tr>
						<td>
								<?php echo'<h4 class="evt_title" >' . get_the_title() . '</h4>' ?>
                            <span><?php the_content() ?></span>
						</td>

						<?php do_action ( 'woocommerce_grouped_product_list_before_price', $product ); ?>

						<td class="price">
							<?php
								echo $product->get_price_html();

								if ( $availability = $product->get_availability() ) {
									$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';
									//echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
								}
							?>
						</td>
                        
                        
                        <td>
							<?php if ( $product->is_sold_individually() || ! $product->is_purchasable() ) : ?>
								<?php woocommerce_template_loop_add_to_cart(); ?>
							<?php else : ?>
								<?php
									$quantites_required = true;
									woocommerce_quantity_input( array( 'input_name' => 'quantity[' . $product_id . ']', 'input_value' => '0', 'min_value' => apply_filters( 'woocommerce_quantity_input_min', 0, $product ), 'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ) ) );
								?>
							<?php endif; ?>
						</td>
                        
					</tr>
					<?php
                    $counter++;
				endforeach;

				// Reset to parent grouped product
				$post    = $parent_product_post;
				$product = wc_get_product( $parent_product_post->ID );
				setup_postdata( $parent_product_post );
			?>
		</tbody>
	</table>

	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

	<?php if ( $quantites_required ) : ?>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<button type="submit" class="single_add_to_cart_button button alt"><?php echo $product->single_add_to_cart_text(); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php endif; ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
