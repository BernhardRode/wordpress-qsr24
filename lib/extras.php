<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

/**
*   Post Formats
*/
add_theme_support( 'post-formats', array( 'image', 'link', 'status', 'gallery' ) );

/**
*   JPEG Quality
*/
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );



/**
*   Responsive Images
*/
// add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
// add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

// function remove_width_attribute( $html ) {
//    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
//    return $html;
// }


/**
* Transparently include ACF
*/

include_once('advanced-custom-fields/acf.php');
//define( 'ACF_LITE', true );

/**
* Define Custom Posttypes and Fields
*/

register_post_type('location', array(
  'label' => 'location',
  'labels' => array(
    'name' => 'Standorte',
    'singular_name' => 'Standort',
    'add_new' => 'Neuer Standort',
    'add_new_item' => 'Standort hinzufügen',
    'edit_item' => 'Standort bearbeiten',
    'new_item' => 'Neues Standort',
    'view_item' => 'Standort anzeigen',
    'search_items' => 'Standorte suchen',
    'not_found' => 'Keine Standorte gefunden',
    'not_found_in_trash' => 'Keine Standorte im Papierkorb gefunden.'
  ),
  'description' => 'Standorte',
  'public' => true,
  'menu_position' => 5,
  'supports' => array(
    //'author',
    //'revisions',
    'title',
    //'editor',
    'thumbnail'
  ),
  // 'taxonomies' => array(
  //   'category',
  //   'post_tag'
  // ),
  // 'has_archive' => true,
  // 'rewrite' => array(
  //   'slug' => 'standort',
  // )
));

//add_post_type_support( 'location', '' );

if(function_exists("register_field_group")) {
  register_field_group(array (
    'id' => 'acf_locations',
    'title' => 'Details',
    'fields' => array (
      array (
        'key' => 'field_5476dd11f716b',
        'label' => 'Straße',
        'name' => 'strasse',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dc5cf7163',
        'label' => 'PLZ',
        'name' => 'plz',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dd21f716c',
        'label' => 'Ort',
        'name' => 'ort',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dc30f7161',
        'label' => 'Land',
        'name' => 'land',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dcb8f716a',
        'label' => 'E-Mail',
        'name' => 'e-mail',
        'type' => 'email',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
      ),
      array (
        'key' => 'field_5476dc71f7164',
        'label' => 'Telefon',
        'name' => 'telefon',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dc8cf7165',
        'label' => 'Fax',
        'name' => 'fax',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dc4df7162',
        'label' => 'Standortleiter',
        'name' => 'standortleiter',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dca4f7168',
        'label' => 'Ansprechpartner',
        'name' => 'ansprechpartner',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dcadf7169',
        'label' => 'Hotline',
        'name' => 'hotline',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dc9df7167',
        'label' => 'Mitarbeiter',
        'name' => 'mitarbeiter',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5476dc94f7166',
        'label' => 'Halle',
        'name' => 'halle',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'location',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
};


register_post_type('history', array(
  'label' => 'history',
  'labels' => array(
    'name' => 'Historie',
    'singular_name' => 'Historie',
    'add_new' => 'Neuen Eintrag',
    'add_new_item' => 'Neuen Eintrag hinzufügen',
    'edit_item' => 'Historie bearbeiten',
    'new_item' => 'Neuen Eintrag',
    'view_item' => 'Eintrag anzeigen',
    'search_items' => 'Einträge suchen',
    'not_found' => 'Keine Einträge gefunden',
    'not_found_in_trash' => 'Keine Einträge im Papierkorb gefunden.'
  ),
  'description' => 'Historie',
  'public' => true,
  'menu_position' => 5,
  'supports' => array(
    //'author',
    //'revisions',
    'title',
    'editor',
    'thumbnail'
  ),
  // 'taxonomies' => array(
  //   'category',
  //   'post_tag'
  // ),
  //'has_archive' => true,
  // 'rewrite' => array(
  //   'slug' => 'historie',
  // )
));


register_post_type('job', array(
  'label' => 'job',
  'labels' => array(
    'name' => 'Stellenangebot',
    'singular_name' => 'Stellenangebot',
    'add_new' => 'Neues Stellenangebot',
    'add_new_item' => 'Stellenangebot hinzufügen',
    'edit_item' => 'Stellenangebot bearbeiten',
    'new_item' => 'Neues Stellenangebot',
    'view_item' => 'Stellenangebot anzeigen',
    'search_items' => 'Stellenangebot suchen',
    'not_found' => 'Keine Stellenangebote gefunden',
    'not_found_in_trash' => 'Keine Stellenangebote im Papierkorb gefunden.'
  ),
  'description' => 'Stellenangebote',
  'public' => true,
  'menu_position' => 5,
  'supports' => array(
    'author',
    'revisions',
    'title',
    'editor',
    'thumbnail'
  ),
  // 'taxonomies' => array(
  //   'category',
  //   'post_tag'
  // ),
  //'has_archive' => true,
  'rewrite' => array(
    'slug' => 'stellenangebote',
  )
));
