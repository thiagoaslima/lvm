<?php
add_action( 'init', 'register_cpt_lvm_people' );

function register_cpt_lvm_people() {

    $labels = array( 
        'name'               => _x( 'Pesquisadores', 'lvm_people' ),
        'singular_name'      => _x( 'Pesquisador', 'lvm_people' ),
        'add_new'            => _x( 'Adicionar Novo Pesquisador', 'lvm_people' ),
        'add_new_item'       => _x( 'Adicionar Novo Pesquisador', 'lvm_people' ),
        'edit_item'          => _x( 'Editar Pesquisador', 'lvm_people' ),
        'new_item'           => _x( 'Novo Pesquisador', 'lvm_people' ),
        'view_item'          => _x( 'Ver Pesquisador', 'lvm_people' ),
        'search_items'       => _x( 'Buscar Pesquisadores', 'lvm_people' ),
        'not_found'          => _x( 'Nenhum Pesquisadores encontrado', 'lvm_people' ),
        'not_found_in_trash' => _x( 'Nenhum Pesquisadores encontrado', 'lvm_people' ),
        'parent_item_colon'  => _x( 'Subordinado a Pesquisador:', 'lvm_people' ),
        'menu_name'          => _x( 'Pesquisadores', 'lvm_people' ),
    );

    $args = array( 
        'labels'              => $labels,
        'hierarchical'        => true,
        'description'         => 'description',
        'taxonomies'          => array( 'category' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        //'menu_icon'         => '',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post', 
        'supports'            => array( 'thumbnail' ),
    );

    register_post_type( 'lvm_people', $args );
}

if ( is_admin() &&  
        ( isset($_GET["post_type"]) || isset($post->type) ) &&
        ( $_GET["post_type"] == "lvm_people" || $post->type == "lvm_people" ) ) {

    require("metaboxes.php");
};
?>