<?php
$template = get_page_template();
global $qsr_template_name;
$qsr_template_name = explode( '/', $template );
$qsr_template_name = end($qsr_template_name);
$qsr_template_name = str_replace('template-','',$qsr_template_name);
$qsr_template_name = str_replace('-locations','',$qsr_template_name);
$qsr_template_name = str_replace('-home','',$qsr_template_name);
$qsr_template_name = str_replace('.php','',$qsr_template_name);

$GLOBALS['qsr_template_name'] = $qsr_template_name;


class QSR_Company_NAV extends Walker_Nav_Menu {
  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    /**
     * Filter the CSS class(es) applied to a menu item's <li>.
     *
     * @since 3.0.0
     *
     * @see wp_nav_menu()
     *
     * @param array  $classes The CSS classes that are applied to the menu item's <li>.
     * @param object $item    The current menu item.
     * @param array  $args    An array of wp_nav_menu() arguments.
     */
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    /**
     * Filter the ID applied to a menu item's <li>.
     *
     * @since 3.0.1
     *
     * @see wp_nav_menu()
     *
     * @param string $menu_id The ID that is applied to the menu item's <li>.
     * @param object $item    The current menu item.
     * @param array  $args    An array of wp_nav_menu() arguments.
     */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $class_names .'>';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

    /**
     * Filter the HTML attributes applied to a menu item's <a>.
     *
     * @since 3.6.0
     *
     * @see wp_nav_menu()
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
     *
     *     @type string $title  Title attribute.
     *     @type string $target Target attribute.
     *     @type string $rel    The rel attribute.
     *     @type string $href   The href attribute.
     * }
     * @param object $item The current menu item.
     * @param array  $args An array of wp_nav_menu() arguments.
     */
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $attributes .= 'data-toggle="tooltip" data-placement="bottom" title="' . $item->title . '"';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    /** This filter is documented in wp-includes/post-template.php */
    $showName = true;
    if ( ( $item->title == "Timework" && $GLOBALS['qsr_template_name'] != 'timework' ) || ( $item->title == "Qualitätssicherung & Rework" && $GLOBALS['qsr_template_name'] != 'quality-and-rework' ) || ( $item->title == "Consulting & Engineering" && $GLOBALS['qsr_template_name'] != 'consulting-and-engineering' ) ) {
      $showName = false;
    }

    if ( $showName == true ) {
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    }

    $item_output .= '</a>';
    $item_output .= $args->after;

    /**
     * Filter a menu item's starting output.
     *
     * The menu item's starting output only includes $args->before, the opening <a>,
     * the menu item's title, the closing </a>, and $args->after. Currently, there is
     * no filter for modifying the opening and closing <li> for a menu item.
     *
     * @since 3.0.0
     *
     * @see wp_nav_menu()
     *
     * @param string $item_output The menu item's starting HTML output.
     * @param object $item        Menu item data object.
     * @param int    $depth       Depth of menu item. Used for padding.
     * @param array  $args        An array of wp_nav_menu() arguments.
     */
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}


?>

<div class="qsrgroup-header <?php echo $GLOBALS['qsr_template_name']; ?>">
  <div class="container">
    <div class="row">
      <div class="col-xs-1">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/qsr-group-dark.png" alt="QSR Group" height="60">
      </div>
      <div class="col-xs-6">
        <h1>Wir sind <em class="highlight">24 Stunden</em> für Sie da.</h1>
        <h2>+49 (0) 163 85 45 47 9</h2>
      </div>
      <div class="col-xs-5 text-right" hidden>
        <a href="">EN</a> | <a href="">DE</a>
      </div>
    </div>
    <div class="company-box">
      <?php
        if (has_nav_menu('companies')) :
          wp_nav_menu(
            array(
              'theme_location' => 'companies',
              'menu_class' => 'company-selector list-inline',
              'depth' => 1,
              'walker' => new QSR_Company_NAV()
            )
          );
        endif;
      ?>
    </div>
  </div>
</div>

<?php
  if (has_nav_menu($GLOBALS['qsr_template_name'])) :
?>
<header class="banner navbar navbar-default navbar-static-top <?php echo $GLOBALS['qsr_template_name']; ?>" role="banner">
  <div class="container">
    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        wp_nav_menu(
          array(
            'theme_location' => $GLOBALS['qsr_template_name'],
            'depth' => 2,
            'menu_class' => 'nav navbar-nav'
          )
        );
      ?>
    </nav>
  </div>
</header>
<?php
  endif;
?>


