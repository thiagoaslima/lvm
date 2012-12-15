<?php
/*
Plugin Name: LVM
Plugin URI: mailto: thiagoaslima@gmail.com
Description: Ferramentas para adequação do wordpress às necessidades do site do Laboratório de Virologia Molecular da UFRJ
Version: 0.2
Author: Thiago Lima
Author URI: thiagoaslima@gmail.com
*/

// CONSTANTES
define( "PLUGIN_URL", plugin_dir_path(__FILE__) );

// REQUIREMENTS


// FUNCTIONS


// ADMIN
if ( is_admin() ) { 
    // People custom post
    require_once("cpt/people/register.php");
}; 



?>
