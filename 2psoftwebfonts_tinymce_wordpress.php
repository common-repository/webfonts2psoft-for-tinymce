<?php
/**
 * @package #webfonts@2PSOFT for TinyMCE
 * @version 1.0
 */
/*
Plugin Name: #webfonts@2PSOFT for TinyMCE
Plugin URI: http://webapp.2psoft.com/wp/plugins/2psoftwebfonts_tinymce
Description: ไทยเว็บไฟอนต์เวิร์ดเพลสปลั๊กอินสำหรับ TinyMCE - Thai Webfonts for TinyMCE Wordpress Plugins
Author: Phuphansot IT Solutions
Version: 1.0
Author URI: http://www.2psoft.com
*/

add_action("admin_head-post.php", function() {
 ?>
 <style>
 @import url("http://webfonts.2psoft.com/api/gencssall.php");
 </style>
 <?php
});

add_filter("mce_buttons_3", "my_mce_buttons_3");
function my_mce_buttons_3( $buttons ) {
 $buttons[] = "fontselect";
 return $buttons;
}

add_filter("tiny_mce_before_init", "wpex_mce_2psoftwebfonts_array");
function wpex_mce_2psoftwebfonts_array( $arrayFonts ) {

 $theme_advanced_fonts = file_get_contents("http://webfonts.2psoft.com/api/gen_tinymce_fontsname_all.php");
 $theme_advanced_fonts .= "Andale Mono=Andale Mono, Times;";
 $theme_advanced_fonts .= "Arial=Arial, Helvetica, sans-serif;";
 $theme_advanced_fonts .= "Arial Black=Arial Black, Avant Garde;";
 $theme_advanced_fonts .= "Book Antiqua=Book Antiqua, Palatino;";
 $theme_advanced_fonts .= "Comic Sans MS=Comic Sans MS, sans-serif;";
 $theme_advanced_fonts .= "Courier New=Courier New, Courier;";
 $theme_advanced_fonts .= "Georgia=Georgia, Palatino;";
 $theme_advanced_fonts .= "Helvetica=Helvetica;";
 $theme_advanced_fonts .= "Impact=Impact, Chicago;";
 $theme_advanced_fonts .= "Symbol=Symbol;";
 $theme_advanced_fonts .= "Tahoma=Tahoma, Arial, Helvetica, sans-serif;";
 $theme_advanced_fonts .= "Terminal=Terminal, Monaco;";
 $theme_advanced_fonts .= "Times New Roman=Times New Roman, Times;";
 $theme_advanced_fonts .= "Trebuchet MS=Trebuchet MS, Geneva;";
 $theme_advanced_fonts .= "Verdana=Verdana, Geneva;";
 $theme_advanced_fonts .= "Webdings=Webdings;";
 $theme_advanced_fonts .= "Wingdings=Wingdings, Zapf Dingbats";
 
 $arrayFonts["font_formats"] = $theme_advanced_fonts;
 return $arrayFonts;
}

add_action("admin_init", "wpex_mce_2psoftwebfonts_styles");
function wpex_mce_2psoftwebfonts_styles() {
 $webfonts = "http://webfonts.2psoft.com/api/gencssall.php";
 add_editor_style( str_replace( ",", "%2C", $webfonts ) );
}

