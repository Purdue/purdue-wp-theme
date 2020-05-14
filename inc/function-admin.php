<?php

/* 
@package purdue-wp-theme
================
Admin page
=============
*/
function admin_scripts() {

    $jsFilePath = glob( get_template_directory() . '/build/js/admin.*.js' );
    $jsFileURI = get_template_directory_uri() . '/build/js/' . basename($jsFilePath[0]);
    wp_enqueue_script( 'admin-script', $jsFileURI, array(), '1.0.0', true );    
}

function admin_styles() {
    $cssFilePath = glob( get_template_directory() . '/build/css/admin.*.css' );
    $cssFileURI = get_template_directory_uri() . '/build/css/' . basename($cssFilePath[0]);
    wp_enqueue_style( 'admin-styles', $cssFileURI );
}
add_action('admin_enqueue_scripts', 'admin_scripts');
add_action('admin_enqueue_scripts', 'admin_styles');
function purdueBrand_add_admin_page(){
    //Generate Sunset Admin page
    // add_menu_page('Site Information', 'Site Information','manage_options','site_information','site_information_create_page','dashicons-admin-customizer', 20);
    // //Generate Sunset Admin sub pages
    // add_submenu_page('site_information', 'Search Options','Search Options','manage_options','site_information','site_information_create_page');
    // add_submenu_page('site_information', 'Footer Information','Footer Information','manage_options','footer_information','footer_information_create_page');
    add_theme_page('Search Options','Search Options','manage_options','search_option','site_information_create_page');
    add_theme_page('Footer Information','Footer Information','manage_options','footer_information','footer_information_create_page');
    //Activate custom settings
    add_action('admin_init', 'purdueBrand_custom_settings');
}
// add_action('admin_menu', 'purdueBrand_add_admin_page');
function site_information_create_page(){
    require_once(get_template_directory().'/inc/admin-pages/search-options.php');
}
function footer_information_create_page(){
    require_once(get_template_directory().'/inc/admin-pages/footer-information.php');
}
function purdueBrand_custom_settings(){
    register_setting('search-option-groups','is_search_all_purdue');
    register_setting('search-option-groups','search_engine_code');

    register_setting('footer-information-groups','use_custom_footer_column_3');
    register_setting('footer-information-groups','column_3_header');
    register_setting('footer-information-groups','column_3_links_1_text');
    register_setting('footer-information-groups','column_3_links_1_link');
    register_setting('footer-information-groups','column_3_links_2_text');
    register_setting('footer-information-groups','column_3_links_2_link');
    register_setting('footer-information-groups','column_3_links_3_text');
    register_setting('footer-information-groups','column_3_links_3_link');
    register_setting('footer-information-groups','column_3_links_4_text');
    register_setting('footer-information-groups','column_3_links_4_link');
    register_setting('footer-information-groups','column_3_links_5_text');
    register_setting('footer-information-groups','column_3_links_5_link');
    register_setting('footer-information-groups','column_3_links_6_text');
    register_setting('footer-information-groups','column_3_links_6_link');
    register_setting('footer-information-groups','use_custom_footer_column_4');
    register_setting('footer-information-groups','column_4_header');
    register_setting('footer-information-groups','column_4_links_1_text');
    register_setting('footer-information-groups','column_4_links_1_link');
    register_setting('footer-information-groups','column_4_links_2_text');
    register_setting('footer-information-groups','column_4_links_2_link');
    register_setting('footer-information-groups','column_4_links_3_text');
    register_setting('footer-information-groups','column_4_links_3_link');
    register_setting('footer-information-groups','column_4_links_4_text');
    register_setting('footer-information-groups','column_4_links_4_link');
    register_setting('footer-information-groups','column_4_links_5_text');
    register_setting('footer-information-groups','column_4_links_5_link');
    register_setting('footer-information-groups','column_4_links_6_text');
    register_setting('footer-information-groups','column_4_links_6_link');

    register_setting('footer-information-groups','use_custom_socialLinks');
    register_setting('footer-information-groups','social_links_1_label');
    register_setting('footer-information-groups','social_links_1');
    register_setting('footer-information-groups','social_links_2_label');
    register_setting('footer-information-groups','social_links_2');
    register_setting('footer-information-groups','social_links_3_label');
    register_setting('footer-information-groups','social_links_3');
    register_setting('footer-information-groups','social_links_4_label');
    register_setting('footer-information-groups','social_links_4');
    register_setting('footer-information-groups','social_links_5_label');
    register_setting('footer-information-groups','social_links_5');
    register_setting('footer-information-groups','social_links_6_label');
    register_setting('footer-information-groups','social_links_6');
    register_setting('footer-information-groups','social_links_7_label');
    register_setting('footer-information-groups','social_links_7');

    add_settings_section('search-results-options', 'Search Options', 'search_options_settings', 'site_information');
    add_settings_section('footer-information', '', 'footer_information_settings', 'footer_information');
    add_settings_section('column-3', '', 'column_3_settings', 'footer_information');
    add_settings_section('column-4', '', 'column_4_settings', 'footer_information');
    add_settings_section('social-links', '', 'social_links_settings', 'footer_information');

    add_settings_field('search-all','Search All Or Part of Purdue', 'search_options','site_information','search-results-options');
    add_settings_field('search-ID','', 'search_ID','site_information','search-results-options');

    add_settings_field('use-custom-footer-column-3','Use custom resource links for column 3?', 'use_custom_footer_column_3','footer_information','column-3');
    add_settings_field('column-3-header','Header', 'column_3_header','footer_information','column-3');
    add_settings_field('column-3-links-1','Link 1', 'column_3_links_1','footer_information','column-3');
    add_settings_field('column-3-links-2','Link 2', 'column_3_links_2','footer_information','column-3');
    add_settings_field('column-3-links-3','Link 3', 'column_3_links_3','footer_information','column-3');
    add_settings_field('column-3-links-4','Link 4', 'column_3_links_4','footer_information','column-3');
    add_settings_field('column-3-links-5','Link 5', 'column_3_links_5','footer_information','column-3');
    add_settings_field('column-3-links-6','Link 6', 'column_3_links_6','footer_information','column-3');
    add_settings_field('use-custom-footer-column-4','Use custom resource links for column 4?', 'use_custom_footer_column_4','footer_information','column-4');
    add_settings_field('column-4-header','Header', 'column_4_header','footer_information','column-4');
    add_settings_field('column-4-links-1','Link 1', 'column_4_links_1','footer_information','column-4');
    add_settings_field('column-4-links-2','Link 2', 'column_4_links_2','footer_information','column-4');
    add_settings_field('column-4-links-3','Link 3', 'column_4_links_3','footer_information','column-4');
    add_settings_field('column-4-links-4','Link 4', 'column_4_links_4','footer_information','column-4');
    add_settings_field('column-4-links-5','Link 5', 'column_4_links_5','footer_information','column-4');
    add_settings_field('column-4-links-6','Link 6', 'column_4_links_6','footer_information','column-4');
 
    add_settings_field('use-custom-socialLinks','Use custom social links on footer?', 'use_custom_socialLinks','footer_information','social-links');
    add_settings_field('social-links-1','', 'social_links_1','footer_information','social-links');
    add_settings_field('social-links-2','', 'social_links_2','footer_information','social-links');
    add_settings_field('social-links-3','', 'social_links_3','footer_information','social-links');
    add_settings_field('social-links-4','', 'social_links_4','footer_information','social-links');
    add_settings_field('social-links-5','', 'social_links_5','footer_information','social-links');
    add_settings_field('social-links-6','', 'social_links_6','footer_information','social-links');
    add_settings_field('social-links-7','', 'social_links_7','footer_information','social-links');
}

function footer_information_settings(){
    echo '<h1>Footer Information</h1>
    <p>Input the information to put on the footer.</p>';
}
function column_3_settings(){
    echo '<h2 class="admin-footer-section">Footer Links Column 3</h2>
    <p>Input links for footer column 3.</p>';
}
function column_4_settings(){
    echo '<h2 class="admin-footer-section">Footer Links Column 4</h2>
    <p>Input links for footer column 4.</p>';
}
function social_links_settings(){
    echo '<h2 class="admin-footer-section">Social Links</h2>
    <p>Input the isocial media links to put on the footer.</p>';
}
function use_custom_socialLinks(){
    $use_custom_socialLinks = get_option( 'use_custom_socialLinks' );
    $checked=(isset($use_custom_socialLinks)&&$use_custom_socialLinks==1?"checked":"");
    echo '<input type="checkbox" name="use_custom_socialLinks" value="1"' .$checked.'/>';
}
function social_links_1(){
    $social_links_1_label = get_option( 'social_links_1_label' );
    $fb=(isset($social_links_1_label)&&$social_links_1_label=='Facebook')?'selected="selected"':'';    
    $twitter=(isset($social_links_1_label)&&$social_links_1_label=='Twitter')?'selected="selected"':'';
    $instagram=(isset($social_links_1_label)&&$social_links_1_label=='Instagram')?'selected="selected"':'';
    $youtube=(isset($social_links_1_label)&&$social_links_1_label=='Youtube')?'selected="selected"':'';
    $pinterest=(isset($social_links_1_label)&&$social_links_1_label=='Pinterest')?'selected="selected"':'';
    $snapchat=(isset($social_links_1_label)&&$social_links_1_label=='Snapchat')?'selected="selected"':'';
    $linkedin=(isset($social_links_1_label)&&$social_links_1_label=='Linkedin')?'selected="selected"':'';     

    $social_links_1 = get_option( 'social_links_1' );
    echo '<select name="social_links_1_label">
            <option value="Facebook" '.$fb.'>Facebook</option>
            <option value="Twitter" '.$twitter.'>Twitter</option>
            <option value="Instagram" '.$instagram.'>Instagram</option>
            <option value="Youtube" '.$youtube.'>Youtube</option>
            <option value="Pinterest" '.$pinterest.'>Pinterest</option>
            <option value="Snapchat" '.$snapchat.'>Snapchat</option>
            <option value="Linkedin" '.$linkedin.'>Linkedin</option>
          </select>
          <input class="social-links" type="text" name="social_links_1" value="'.$social_links_1.'" placeholder="Put the link here"/><span class="dashicons dashicons-plus"></span>';
}
function social_links_2(){
    $social_links_2_label = get_option( 'social_links_2_label' );
    $fb=(isset($social_links_2_label)&&$social_links_2_label=='Facebook')?'selected="selected"':'';    
    $twitter=(isset($social_links_2_label)&&$social_links_2_label=='Twitter')?'selected="selected"':'';
    $instagram=(isset($social_links_2_label)&&$social_links_2_label=='Instagram')?'selected="selected"':'';
    $youtube=(isset($social_links_2_label)&&$social_links_2_label=='Youtube')?'selected="selected"':'';
    $pinterest=(isset($social_links_2_label)&&$social_links_2_label=='Pinterest')?'selected="selected"':'';
    $snapchat=(isset($social_links_2_label)&&$social_links_2_label=='Snapchat')?'selected="selected"':'';
    $linkedin=(isset($social_links_2_label)&&$social_links_2_label=='Linkedin')?'selected="selected"':'';     

    $social_links_2 = get_option( 'social_links_2' );
    echo '<select name="social_links_2_label">
            <option value="Facebook" '.$fb.'>Facebook</option>
            <option value="Twitter" '.$twitter.'>Twitter</option>
            <option value="Instagram" '.$instagram.'>Instagram</option>
            <option value="Youtube" '.$youtube.'>Youtube</option>
            <option value="Pinterest" '.$pinterest.'>Pinterest</option>
            <option value="Snapchat" '.$snapchat.'>Snapchat</option>
            <option value="Linkedin" '.$linkedin.'>Linkedin</option>
          </select>
          <input class="social-links" type="text" name="social_links_2" value="'.$social_links_2.'" placeholder="Put the link here"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function social_links_3(){
    $social_links_3_label = get_option( 'social_links_3_label' );
    $fb=(isset($social_links_3_label)&&$social_links_3_label=='Facebook')?'selected="selected"':'';    
    $twitter=(isset($social_links_3_label)&&$social_links_3_label=='Twitter')?'selected="selected"':'';
    $instagram=(isset($social_links_3_label)&&$social_links_3_label=='Instagram')?'selected="selected"':'';
    $youtube=(isset($social_links_3_label)&&$social_links_3_label=='Youtube')?'selected="selected"':'';
    $pinterest=(isset($social_links_3_label)&&$social_links_3_label=='Pinterest')?'selected="selected"':'';
    $snapchat=(isset($social_links_3_label)&&$social_links_3_label=='Snapchat')?'selected="selected"':'';
    $linkedin=(isset($social_links_3_label)&&$social_links_3_label=='Linkedin')?'selected="selected"':'';     

    $social_links_3 = get_option( 'social_links_3' );
    echo '<select name="social_links_3_label">
            <option value="Facebook" '.$fb.'>Facebook</option>
            <option value="Twitter" '.$twitter.'>Twitter</option>
            <option value="Instagram" '.$instagram.'>Instagram</option>
            <option value="Youtube" '.$youtube.'>Youtube</option>
            <option value="Pinterest" '.$pinterest.'>Pinterest</option>
            <option value="Snapchat" '.$snapchat.'>Snapchat</option>
            <option value="Linkedin" '.$linkedin.'>Linkedin</option>
          </select>
          <input class="social-links" type="text" name="social_links_3" value="'.$social_links_3.'" placeholder="Put the link here"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function social_links_4(){
    $social_links_4_label = get_option( 'social_links_4_label' );
    $fb=(isset($social_links_4_label)&&$social_links_4_label=='Facebook')?'selected="selected"':'';    
    $twitter=(isset($social_links_4_label)&&$social_links_4_label=='Twitter')?'selected="selected"':'';
    $instagram=(isset($social_links_4_label)&&$social_links_4_label=='Instagram')?'selected="selected"':'';
    $youtube=(isset($social_links_4_label)&&$social_links_4_label=='Youtube')?'selected="selected"':'';
    $pinterest=(isset($social_links_4_label)&&$social_links_4_label=='Pinterest')?'selected="selected"':'';
    $snapchat=(isset($social_links_4_label)&&$social_links_4_label=='Snapchat')?'selected="selected"':'';
    $linkedin=(isset($social_links_4_label)&&$social_links_4_label=='Linkedin')?'selected="selected"':'';     

    $social_links_4 = get_option( 'social_links_4' );
    echo '<select name="social_links_4_label">
            <option value="Facebook" '.$fb.'>Facebook</option>
            <option value="Twitter" '.$twitter.'>Twitter</option>
            <option value="Instagram" '.$instagram.'>Instagram</option>
            <option value="Youtube" '.$youtube.'>Youtube</option>
            <option value="Pinterest" '.$pinterest.'>Pinterest</option>
            <option value="Snapchat" '.$snapchat.'>Snapchat</option>
            <option value="Linkedin" '.$linkedin.'>Linkedin</option>
          </select>
          <input class="social-links" type="text" name="social_links_4" value="'.$social_links_4.'" placeholder="Put the link here"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function social_links_5(){
    $social_links_5_label = get_option( 'social_links_5_label' );
    $fb=(isset($social_links_5_label)&&$social_links_5_label=='Facebook')?'selected="selected"':'';    
    $twitter=(isset($social_links_5_label)&&$social_links_5_label=='Twitter')?'selected="selected"':'';
    $instagram=(isset($social_links_5_label)&&$social_links_5_label=='Instagram')?'selected="selected"':'';
    $youtube=(isset($social_links_5_label)&&$social_links_5_label=='Youtube')?'selected="selected"':'';
    $pinterest=(isset($social_links_5_label)&&$social_links_5_label=='Pinterest')?'selected="selected"':'';
    $snapchat=(isset($social_links_5_label)&&$social_links_5_label=='Snapchat')?'selected="selected"':'';
    $linkedin=(isset($social_links_5_label)&&$social_links_5_label=='Linkedin')?'selected="selected"':'';     

    $social_links_5 = get_option( 'social_links_5' );
    echo '<select name="social_links_5_label">
            <option value="Facebook" '.$fb.'>Facebook</option>
            <option value="Twitter" '.$twitter.'>Twitter</option>
            <option value="Instagram" '.$instagram.'>Instagram</option>
            <option value="Youtube" '.$youtube.'>Youtube</option>
            <option value="Pinterest" '.$pinterest.'>Pinterest</option>
            <option value="Snapchat" '.$snapchat.'>Snapchat</option>
            <option value="Linkedin" '.$linkedin.'>Linkedin</option>
          </select>
          <input class="social-links" type="text" name="social_links_5" value="'.$social_links_5.'" placeholder="Put the link here"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function social_links_6(){
    $social_links_6_label = get_option( 'social_links_6_label' );
    $fb=(isset($social_links_6_label)&&$social_links_6_label=='Facebook')?'selected="selected"':'';    
    $twitter=(isset($social_links_6_label)&&$social_links_6_label=='Twitter')?'selected="selected"':'';
    $instagram=(isset($social_links_6_label)&&$social_links_6_label=='Instagram')?'selected="selected"':'';
    $youtube=(isset($social_links_6_label)&&$social_links_6_label=='Youtube')?'selected="selected"':'';
    $pinterest=(isset($social_links_6_label)&&$social_links_6_label=='Pinterest')?'selected="selected"':'';
    $snapchat=(isset($social_links_6_label)&&$social_links_6_label=='Snapchat')?'selected="selected"':'';
    $linkedin=(isset($social_links_6_label)&&$social_links_6_label=='Linkedin')?'selected="selected"':'';     

    $social_links_6 = get_option( 'social_links_6' );
    echo '<select name="social_links_6_label">
            <option value="Facebook" '.$fb.'>Facebook</option>
            <option value="Twitter" '.$twitter.'>Twitter</option>
            <option value="Instagram" '.$instagram.'>Instagram</option>
            <option value="Youtube" '.$youtube.'>Youtube</option>
            <option value="Pinterest" '.$pinterest.'>Pinterest</option>
            <option value="Snapchat" '.$snapchat.'>Snapchat</option>
            <option value="Linkedin" '.$linkedin.'>Linkedin</option>
          </select>
          <input class="social-links" type="text" name="social_links_6" value="'.$social_links_6.'" placeholder="Put the link here"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function social_links_7(){
    $social_links_7_label = get_option( 'social_links_7_label' );
    $fb=(isset($social_links_7_label)&&$social_links_7_label=='Facebook')?'selected="selected"':'';    
    $twitter=(isset($social_links_7_label)&&$social_links_7_label=='Twitter')?'selected="selected"':'';
    $instagram=(isset($social_links_7_label)&&$social_links_7_label=='Instagram')?'selected="selected"':'';
    $youtube=(isset($social_links_7_label)&&$social_links_7_label=='Youtube')?'selected="selected"':'';
    $pinterest=(isset($social_links_7_label)&&$social_links_7_label=='Pinterest')?'selected="selected"':'';
    $snapchat=(isset($social_links_7_label)&&$social_links_7_label=='Snapchat')?'selected="selected"':'';
    $linkedin=(isset($social_links_7_label)&&$social_links_7_label=='Linkedin')?'selected="selected"':'';     

    $social_links_7 = get_option( 'social_links_7' );
    echo '<select name="social_links_7_label">
            <option value="Facebook" '.$fb.'>Facebook</option>
            <option value="Twitter" '.$twitter.'>Twitter</option>
            <option value="Instagram" '.$instagram.'>Instagram</option>
            <option value="Youtube" '.$youtube.'>Youtube</option>
            <option value="Pinterest" '.$pinterest.'>Pinterest</option>
            <option value="Snapchat" '.$snapchat.'>Snapchat</option>
            <option value="Linkedin" '.$linkedin.'>Linkedin</option>
          </select>
          <input class="social-links" type="text" name="social_links_7" value="'.$social_links_7.'" placeholder="Put the link here"/><span class="dashicons dashicons-no"></span>';
}
function use_custom_footer_column_3(){
    $use_custom_footer_column_3 = get_option( 'use_custom_footer_column_3' );
    $checked=(isset($use_custom_footer_column_3)&&$use_custom_footer_column_3==1?"checked":"");
    echo '<input type="checkbox" name="use_custom_footer_column_3" value="1"' .$checked.'/>';
}
function column_3_header(){
    $column_3_header = get_option( 'column_3_header' );
    echo '<input class="column-3-header" type="text" name="column_3_header" value="'.$column_3_header.'" placeholder=""/>';
}
function column_3_links_1(){
    $column_3_links_1_text = get_option( 'column_3_links_1_text' );
    $column_3_links_1_link = get_option( 'column_3_links_1_link' );
    echo '<input class="column-3-links-text" type="text" name="column_3_links_1_text" value="'.$column_3_links_1_text.'" placeholder="Link text"/><input class="column-3-links-link" type="text" name="column_3_links_1_link" value="'.$column_3_links_1_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_3_links_2(){
    $column_3_links_2_text = get_option( 'column_3_links_2_text' );
    $column_3_links_2_link = get_option( 'column_3_links_2_link' );
    echo '<input class="column-3-links-text" type="text" name="column_3_links_2_text" value="'.$column_3_links_2_text.'" placeholder="Link text"/><input class="column-3-links-link" type="text" name="column_3_links_2_link" value="'.$column_3_links_2_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_3_links_3(){
    $column_3_links_3_text = get_option( 'column_3_links_3_text' );
    $column_3_links_3_link = get_option( 'column_3_links_3_link' );
    echo '<input class="column-3-links-text" type="text" name="column_3_links_3_text" value="'.$column_3_links_3_text.'" placeholder="Link text"/><input class="column-3-links-link" type="text" name="column_3_links_3_link" value="'.$column_3_links_3_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_3_links_4(){
    $column_3_links_4_text = get_option( 'column_3_links_4_text' );
    $column_3_links_4_link = get_option( 'column_3_links_4_link' );
    echo '<input class="column-3-links-text" type="text" name="column_3_links_4_text" value="'.$column_3_links_4_text.'" placeholder="Link text"/><input class="column-3-links-link" type="text" name="column_3_links_4_link" value="'.$column_3_links_4_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_3_links_5(){
    $column_3_links_5_text = get_option( 'column_3_links_5_text' );
    $column_3_links_5_link = get_option( 'column_3_links_5_link' );
    echo '<input class="column-3-links-text" type="text" name="column_3_links_5_text" value="'.$column_3_links_5_text.'" placeholder="Link text"/><input class="column-3-links-link" type="text" name="column_3_links_5_link" value="'.$column_3_links_5_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_3_links_6(){
    $column_3_links_6_text = get_option( 'column_3_links_6_text' );
    $column_3_links_6_link = get_option( 'column_3_links_6_link' );
    echo '<input class="column-3-links-text" type="text" name="column_3_links_6_text" value="'.$column_3_links_6_text.'" placeholder="Link text"/><input class="column-3-links-link" type="text" name="column_3_links_6_link" value="'.$column_3_links_6_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function use_custom_footer_column_4(){
    $use_custom_footer_column_4 = get_option( 'use_custom_footer_column_4' );
    $checked=(isset($use_custom_footer_column_4)&&$use_custom_footer_column_4==1?"checked":"");
    echo '<input type="checkbox" name="use_custom_footer_column_4" value="1"' .$checked.'/>';
}
function column_4_header(){
    $column_4_header = get_option( 'column_4_header' );
    echo '<input class="column-4-header" type="text" name="column_4_header" value="'.$column_4_header.'" placeholder=""/>';
}
function column_4_links_1(){
    $column_4_links_1_text = get_option( 'column_4_links_1_text' );
    $column_4_links_1_link = get_option( 'column_4_links_1_link' );
    echo '<input class="column-4-links-text" type="text" name="column_4_links_1_text" value="'.$column_4_links_1_text.'" placeholder="Link text"/><input class="column-4-links-link" type="text" name="column_4_links_1_link" value="'.$column_4_links_1_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_4_links_2(){
    $column_4_links_2_text = get_option( 'column_4_links_2_text' );
    $column_4_links_2_link = get_option( 'column_4_links_2_link' );
    echo '<input class="column-4-links-text" type="text" name="column_4_links_2_text" value="'.$column_4_links_2_text.'" placeholder="Link text"/><input class="column-4-links-link" type="text" name="column_4_links_2_link" value="'.$column_4_links_2_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_4_links_3(){
    $column_4_links_3_text = get_option( 'column_4_links_3_text' );
    $column_4_links_3_link = get_option( 'column_4_links_3_link' );
    echo '<input class="column-4-links-text" type="text" name="column_4_links_3_text" value="'.$column_4_links_3_text.'" placeholder="Link text"/><input class="column-4-links-link" type="text" name="column_4_links_3_link" value="'.$column_4_links_3_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_4_links_4(){
    $column_4_links_4_text = get_option( 'column_4_links_4_text' );
    $column_4_links_4_link = get_option( 'column_4_links_4_link' );
    echo '<input class="column-4-links-text" type="text" name="column_4_links_4_text" value="'.$column_4_links_4_text.'" placeholder="Link text"/><input class="column-4-links-link" type="text" name="column_4_links_4_link" value="'.$column_4_links_4_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_4_links_5(){
    $column_4_links_5_text = get_option( 'column_4_links_5_text' );
    $column_4_links_5_link = get_option( 'column_4_links_5_link' );
    echo '<input class="column-4-links-text" type="text" name="column_4_links_5_text" value="'.$column_4_links_5_text.'" placeholder="Link text"/><input class="column-4-links-link" type="text" name="column_4_links_5_link" value="'.$column_4_links_5_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function column_4_links_6(){
    $column_4_links_6_text = get_option( 'column_4_links_6_text' );
    $column_4_links_6_link = get_option( 'column_4_links_6_link' );
    echo '<input class="column-4-links-text" type="text" name="column_4_links_6_text" value="'.$column_4_links_6_text.'" placeholder="Link text"/><input class="column-4-links-link" type="text" name="column_4_links_6_link" value="'.$column_4_links_6_link.'" placeholder="Link URL"/><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span>';
}
function search_options_settings(){
    echo 'Choose to search all of Purdue sites or some of Purdue sites.';
}
function search_options(){
    $isSearchAll = get_option( 'is_search_all_purdue' );
    $all=(isset($isSearchAll)&&$isSearchAll=="all")?"checked":"";    
    $part=(isset($isSearchAll)&&$isSearchAll=="part")?"checked":"";
    echo '<input type="radio" name="is_search_all_purdue" value="all" '.$all.'/><label>All of Purdue</label>
    <input type="radio" name="is_search_all_purdue" value="part" '.$part.'/><label>Part of Purdue</label>';
}
function search_ID(){
    $sCode = get_option( 'search_engine_code' );
    echo '<label class="search_engine_code">If you want users search part of Purdue, Please put your Google Search Engine ID here</label><input type="text" name="search_engine_code" value="'.$sCode.'" placeholder="Google Search Engine ID"/>';
}
