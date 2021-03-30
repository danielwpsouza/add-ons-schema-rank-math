<?php
/*
	* Plugin Name: Add-ons Schema Rank Math
	* Plugin URL: https://www.diletec.com.br
	* Description: Modifica o schema
	* Version: 0.1
	* Author: Diletec
	* Author URI: https://www.diletec.com.br
    * Requires at least: 4.4
    * Requires PHP: 7.0
    * Rank Math SEO requires at least: 1.0.60
    * Rank Math SEO tested up to: 1.0.60.1
*/


/**
 * Collect data to output in JSON-LD.
 *
 * @param array  $unsigned An array of data to output in json-ld.
 * @param JsonLD $unsigned JsonLD instance.
 */
add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
    $keywords = array();

    if(isset(get_post_meta($jsonld->post_id,"rank_math_focus_keyword")[0])){
        $keywords = explode(",",get_post_meta($jsonld->post_id,"rank_math_focus_keyword")[0]);

        if(isset($data["WebPage"])){
	        $data["WebPage"]["keywords"] = $keywords;
        }
    }

	return [$data];
}, 99, 2);
