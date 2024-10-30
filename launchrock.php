<?php
/*
Plugin Name: LaunchRock
Plugin URI: http://www.insideout.io
Description: A LaunchRock plug-in to embed the sign-up form in your blog.
Version: 1.1.9
Author: David Riccitelli
Author URI: http://www.insideout.io
License: GPL2
*/

function launchrock_shortcode( $atts, $content = '' ) {
	
	if ( empty( $atts['site'] ) )
		return '<strong>LaunchRock site id not set.</strong>';

	$site       = esc_attr( $atts['site'] );

	$form_class = ( isset( $atts['form_class'] ) ? 'class="' . esc_attr( $atts['form_class'] ) . '"' : '' );
	$btn_class  = ( isset( $atts['btn_class'] )  ? 'class="' . esc_attr( $atts['btn_class'] ) . '"'  : '' );
	$btn_text   = ( isset( $atts['btn_text'] )   ? esc_attr( $atts['btn_text'] )                     : 'Go' );

	$c = <<<EOF

		<div id="launchrock">
			<form $form_class onsubmit="window.launchrock(this); return false;">
				<p class="form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="text" value="" size="30"></p>
EOF;

	$c .= do_shortcode( $content );

	$c .= <<<EOF
				<input $btn_class name="submit" type="submit" id="submit" value="$btn_text">
				<input type="hidden" name="site_id" id="site_id" value="$site">
				</p>
			</form>
		</div>
EOF;

	return $c;

}

function launchrock_field_shortcode( $atts, $content = '' ) {

	if ( empty( $atts['name'] ) || empty( $atts['label'] ) )
		return '';

	$name  = esc_attr( $atts['name'] );
	$label = esc_html( $atts['label'] );
	$req   = ( isset( $atts['required'] ) && 'yes' === $atts['required'] );
	$reqh  = ( $req ? '<span class="required">*</span>' : '' );

	return "<p><label for='$name'>$label $reqh</label> <input id='$name' name='$name' type='text' value='' size='30'></p>";

}

function launchrock_success_shortcode( $atts, $content = '' ) {

	$c = do_shortcode( $content );

	return "<p style='display: none;' class='launchrock success-template'>$c</p><p style='display: none;' class='launchrock success'>$c</p>";

}

function launchrock_failure_shortcode( $atts, $content = '' ) {

	$c = do_shortcode( $content );

	return "<p style='display: none;' class='launchrock failure-template'>$c</p><p style='display: none;' class='launchrock failure'></p>";

}

function launchrock_enqueue_scripts() {

    wp_enqueue_script( 'launchrock',
    	plugins_url( '/js/launchrock.js' , __FILE__ ),
		array( 'jquery' )
	);

}

add_action( 'wp_enqueue_scripts',     'launchrock_enqueue_scripts' );
add_shortcode( 'launchrock' ,         'launchrock_shortcode' );
add_shortcode( 'launchrock_field' ,   'launchrock_field_shortcode' );
add_shortcode( 'launchrock_success' , 'launchrock_success_shortcode' );
add_shortcode( 'launchrock_failure' , 'launchrock_failure_shortcode' );
?>
