<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap','font-awesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

function sample_admin_notice__success() {
?>
<div id="admin-torres-digital" class="notice notice-success is-dismissible" style="font-weight: 600">
    <p><?php _e( 'Torres Digital Wordpress Theme !', 'sample-text-domain' ); ?></p>
</div>
<?php
                                        }
add_action( 'admin_notices', 'sample_admin_notice__success' );

/*woocommerce*/
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*Hook página de pedidos*/
add_action( 'woocommerce_thankyou', 'misha_poll_form', 4 );
function misha_poll_form( $order_id ) {
    echo '<h2>Esta é sua Ordem de Pedido</h2> <br>
          <div id="minha-conta-botao" class="minha-conta-botao">
         Para acessar seus detalhes de conta, basta clicar no botão
        <a href="/minha-conta">Acessar minha Conta | Painel de Controle</a> </div>';

}

/*Hook página de pedidos*/
add_action( 'woocommerce_account_content', 'sul_america_host_my_account_content', 4 );
function sul_america_host_my_account_content () {

    echo ' <div id="sul_america_host_my_account_content" class="sul_america_host_my_account_content">

           <h2>Portal do Cliente</h2>

           <p> Este é seu Portal e através dele você pode Gerenciar as informações da sua contratação</p>

         </div>';

}
/*widgets classic
https://developer.wordpress.org/block-editor/how-to-guides/widgets/opting-out/
*/
function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );




// To change add to cart text on single product page // https://www.codegearthemes.com/blogs/woocommerce/woocommerce-how-to-change-add-to-cart-button-text
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Contratar', 'woocommerce' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Contratar', 'woocommerce' );
}



/* Cart Redirect ! *
add_filter( 'woocommerce_add_to_cart_redirect', 'misha_skip_cart_redirect_checkout' );

function misha_skip_cart_redirect_checkout( $url ) {
    return wc_get_checkout_url();
}
