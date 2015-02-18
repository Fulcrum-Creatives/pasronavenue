<?php
/* Theme Variables
===============================================================================*/
/**
  * The name of your theme
  */
$theme_name =   'Nu Theme'; 
$content_width = 1200;
$theme_menu_list = array(
                    'Primary'
  );
$theme_sidebar_list = array(
                    'Main' => array(
                              'class'         => '',
                              'before_widget' => '<li id="%1$s" class="widget %2$s">',
                              'after_widget'  => '</li>',
                              'before_title'  => '<div class="widget-header"><h2>',
                              'after_title'   => '</h2></div>'
                      )
  );
$first_menu_item_class_name = 'first-menu-item';          // First top menu item
$last_menu_item_class_name = 'last-menu-item';            // Last top menu item
$first_sub_menu_item_class_name = 'first-sub-menu-item';  // First sub-menu item
$last_sub_menu_item_class_name = 'last-sub-menu-item';    // Last sub-menu item
/* WordPress Global Variabls
===============================================================================*/
global $user_ID;
/* Includes
===============================================================================*/
/* Required
*************************************/
require(get_template_directory() . '/includes/constant-variables.php');
/* Content Width
===============================================================================*/
if (!isset($content_width));
/* Add Theme Support
===============================================================================*/
function addThemeSupport() {
    $custom_header_defaults = array(
      'default-image'          => '',
      'random-default'         => false,
      'width'                  => 0,
      'height'                 => 0,
      'flex-height'            => false,
      'flex-width'             => false,
      'default-text-color'     => '444',
      'header-text'            => true,
      'uploads'                => true,
      'wp-head-callback'       => '',
      'admin-head-callback'    => '',
      'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $custom_header_defaults );
    $custom_background_defaults = array(
      'default-color'          => '',
      'default-image'          => '',
      'wp-head-callback'       => '_custom_background_cb',
      'admin-head-callback'    => '',
      'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $custom_background_defaults );
    $html5_support = array(
      'search-form',
      'comment-form',
      'comment-list',
    );
    add_theme_support( 'html5', $html5_support );
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_image_size( 'large', 685, 385, true );
    add_image_size( 'middle', 317, 181, true );
    add_image_size( 'small', 150, 150, true );
}
add_action( 'after_setup_theme', 'addThemeSupport' );

/* Remove Admin Bar on Front-end
===============================================================================*/
add_filter('show_admin_bar', '__return_false');
/* Editor Styles
===============================================================================*/
function add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'add_editor_styles' );
/* Register Menus
===============================================================================*/
include(THEME_DIR. 'includes/classes/register_menus.php');
new Register_Menus_Class($theme_menu_list);
/* Register Sidebars
===============================================================================*/
include(THEME_DIR. 'includes/classes/register_sidebars.php');
new Register_Sidebars_Class($theme_sidebar_list);
/* Custom Post Types
===============================================================================*/
include(THEME_DIR. 'includes/custom-post-types/cpt_sponsor.php');
include(THEME_DIR. 'includes/custom-post-types/cpt_partner.php');
include(THEME_DIR. 'includes/custom-post-types/cpt_numbers.php');
/* Custom Widgets
===============================================================================*/
include(THEME_DIR. 'includes/custom-widgets/widget_percentage.php');
/* Nav Menu First and Last Classes
===============================================================================*/
$first_last_classes = array(
                        $first_menu_item_class_name,
                        $last_menu_item_class_name,
                        $first_sub_menu_item_class_name,
                        $last_sub_menu_item_class_name,
);
include(THEME_DIR. 'includes/classes/first_last_classes.php');
new First_Last_Classes_Class($first_last_classes);
/* Clean Nav Menu Classes
===============================================================================*/
include(THEME_DIR. 'includes/classes/clean_menu_classes.php');
new Clean_Menu_Classes_Class($menu_class_list, $first_last_classes);
/* Clean Nav Menu IDs
===============================================================================*/
include(THEME_DIR. 'includes/classes/clean_menu_id.php');
new Clean_Menu_IDs_Class_Class();
/*  Load JavaScript
===============================================================================*/
/*  jQuery
*************************************/
function load_jquery() {
  wp_enqueue_script('jquery');
}
add_action('init', 'load_jquery');
/* IE Conditional
===============================================================================*/
function load_ie() {
  ob_start();?>
<!-- HTML5 and Media Query Support for IE -->
    <!--[if (lt IE 9) & (!IEMobile)]>
    <script src="<?php bloginfo('template_url'); ?>/js/ie.js"></script>
    <![endif]-->
<!-- wp-head -->
  <?php
  echo ob_get_clean(); echo "\n";
}
add_action('wp_head', 'load_ie',10);
/*  Media Element
*************************************/
function load_mediaelement() {
  if(!is_admin()){
    wp_register_script('mediaelement.js', THEME_URL . 'js/mediaelement.min.js', false, '1.0', false);
    wp_enqueue_script('mediaelement.js');
  }
}
add_action('init', 'load_mediaelement'); 
/*  JS Template
************************************
function load_template() {
  wp_register_script('template.js', THEME_URL . 'js/template.js', false, '1.0', false);
  wp_enqueue_script('template.js');
}
add_action('init', 'load_template'); */
/* Custom Comments Layout
===============================================================================*/
/* Enqueue Comment Reply JavaScript
*************************************/
function enqueue_comments_reply() {
  if(is_single()){
    if( get_option('thread_comments'))  {
        wp_enqueue_script('comment-reply');
    }
  }
}
add_action( 'wp_head', 'enqueue_comments_reply' );
/* Custom Comments Layout
*************************************/
function custom_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;?>
  <li id="comment-<?php comment_ID() ?>" <?php comment_class('comment-box') ?>>
    <?php global $user_ID; if( $user_ID ) : ?>
    <?php if( current_user_can('administrator') ) : ?>
      <!-- Comment Edit Link -->
      <div class="comment-edit">
        <?php edit_comment_link(__('Edit', DOMAIN),'','') ?>
      </div>
      <!-- .comment-edit -->
      <!-- Comment Approval -->
      <div class="comment-approval">
        <p>
        <?php 
          if ($comment->comment_approved == '0') 
          _e("Your comment is awaiting moderation.", '') 
        ?>
        </p>
      </div>
      <!-- .comment-approval -->
    <?php endif; endif; ?>
    <!-- Comment Container -->
    <article class="comment-container">
      <!-- Comment Header -->
      <header class="comment-header comment-meta">
        <!-- Comment Author -->
        <div class="comment-author vcard">
          <!-- Comment Author Avitar -->
          <div class="comment-author-avatar">
            <?php echo get_avatar($comment,$size='50'); ?>
          </div><!-- comment-author-avatar -->
          <!-- Comment Author Name -->
          <div class="comment-author-name author">
            <?php printf(__('%s', DOMAIN), get_comment_author_link()) ?>
          </div><!-- comment-author-date -->
        </div><!-- .comment-author -->
        <!-- Comment Date Posted -->
        <div class="comment-date">
          <?php echo the_time('F j, Y');?> <?php echo the_time(); ?>
        </div><!-- .comment-date -->
      </header><!-- .comment-header -->
      <!-- Comment Body -->
      <section class="comment-body">
          <?php comment_text() ?>
      </section><!-- .comment-body -->
      <!-- Comment Footer -->
      <footer class="comment-footer">
          <!-- Comment Reply Link -->
          <div class="comment-reply">
              <?php 
                comment_reply_link(array_merge((array) $args, array(
                                                              'depth' => $depth,
                                                              'max_depth' => $args['max_depth'],
                                                              'reply_text' => __('Reply','')))); 
              ?>
          </div><!-- .comment-reply -->
      </footer><!-- .comment-footer -->
    </article><!-- .comment-container -->
  <?php // Do Not Close the <li> Tag -->  ?>
<?php }
/* Localization
===============================================================================*/
function localization(){
    load_theme_textdomain(DOMAIN, get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'localization');
/* Malicious URL Requests
===============================================================================*/
include(THEME_DIR. 'includes/classes/malicious_url_requests.php');
new Malicious_URL_Requests_Class($user_ID);
/* Remove WordPress Generated tags in head
===============================================================================*/
function remove_generated_tags(){
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
}
add_action( 'init', 'remove_generated_tags' );
/* Hide Login Error Messages
===============================================================================*/
add_filter('login_errors',create_function('$a', "return null;"));
/* Change Excerpt Elipsis
===============================================================================*/
function new_excerpt_more( $more ) {
  return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');
/* Custom User Profile Fields
===============================================================================*/
function modify_contact_methods($profile_fields) {

  // Add new fields
  $profile_fields['facebook'] = 'Facebook URL';
  $profile_fields['twitter'] = 'Twitter Username';
  $profile_fields['linkedin'] = 'LinkedIn URL';
  $profile_fields['googleplus'] = 'Google+ URL';

  return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

/* Add placeholer feild for gravity forms
===============================================================================*/
add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);
function my_standard_settings($position, $form_id){
    if($position == 25){ ?>  
        <li class="admin_label_setting field_setting" style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text
                <a href="javascript:void(0);" class="tooltip tooltip_form_field_placeholder" tooltip="&lt;h6&gt;Placeholder&lt;/h6&gt;Enter the placeholder/default text for this field.">(?)</a>
            </label>
            <input type="text" id="field_placeholder" class="fieldwidth-3" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php 
    }
}
add_action("gform_editor_js", "my_gform_editor_js");
function my_gform_editor_js(){ ?>
<script>
  jQuery(document).bind("gform_load_field_settings", function(event, field, form){
    jQuery("#field_placeholder").val(field["placeholder"]);
  });
</script>
<?php
}
add_action('gform_enqueue_scripts',"my_gform_enqueue_scripts", 10, 2);
function my_gform_enqueue_scripts($form, $is_ajax=false){?>
    <script>
        jQuery(function(){
            <?php
            foreach($form['fields'] as $i=>$field){
                if(isset($field['placeholder']) && !empty($field['placeholder'])){      
                    ?>        
                    jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');       
                    <?php
                }
            }
            ?>
        });
    </script>
<?php
}
?>