<?php 
if( isset($post->ID) || isset($post_id) ) {
    $metaDados   = get_post_meta($post_id);
}
require PLUGIN_URL . 'cpt/inc/campos.php';


// Register function to be called when admin interface is visited
add_action( 'admin_init', 'cpt_lvm_people_admin_interface_init' );


// Function to register new meta box for book review post editor
function cpt_lvm_people_admin_interface_init() {

    add_meta_box( 

        //html id that will be applied to this metabox
        'cpt_lvm_people_dados_pessoais',

         //appears at the top of the new metabox when displayed
        'Dados Pessoais',

        //callback >  the function which will load the html into the metabox                           
        'cpt_lvm_people_dados_pessoais_html_def',

        //name of our custom post type
        'lvm_people',

        //where the box will appear. can be "normal", "advanced" or "side"
        'normal',

        //priority within the context where the boxes should show ('high', 'core', 'default' or 'low') );
        'high',

        //(optional) Arguments to pass into your callback function. The callback will receive the  object and whatever parameters are passed through this variable
        ''
    );

    add_meta_box( 

        //html id that will be applied to this metabox
        'cpt_lvm_people_contatos',

         //appears at the top of the new metabox when displayed
        'Contatos',

        //callback >  the function which will load the html into the metabox                           
        'cpt_lvm_people_contatos_html_def',

        //name of our custom post type
        'lvm_people',

        //where the box will appear. can be "normal", "advanced" or "side"
        'normal',

        //priority within the context where the boxes should show ('high', 'core', 'default' or 'low') );
        'high',

        //(optional) Arguments to pass into your callback function. The callback will receive the  object and whatever parameters are passed through this variable
        ''
    );
}

// Function to display meta box contents
function cpt_lvm_people_dados_pessoais_html_def( $post_type ) {
    require_once("metaboxes/dados_pessoais.php");
}

// Function to display meta box contents
function cpt_lvm_people_contatos_html_def( $post_type ) {
    require_once("metaboxes/contatos.php");
}

add_action( 
        'save_post', 
        'cpt_lvm_people_save_data', 
        10, 
        2 
);

function cpt_lvm_people_save_data( $post_id = false, $post = false ) {
    
    // Check post type
    if ( $post->post_type == 'lvm_people' ) {
        //require_once("savedata.php");
    }
}
?>