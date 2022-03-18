<?php

function config_sidebar()
{
    // Untuk Mendapatkan Uri segment
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);

    // Config Sidebar
    $data = array(
        array(
            'title-group' => 'Codeigniter-array',
            'title' => 'Doc',
            'icon' => 'fas fa-address-book',
            'link' => '#doc', //Jika tidak menggunakan submenu Isi dengan Link , Jika memakai submenu isi dengan #
            'sub_menu' => doc(), // Jika tidak ada sub menu dikosongkan saja  , Jika pakai submenu isi dengan function 
            'id_collapse' => 'doc', // Jika Memakai submenu isi samakan dengan link tanpa #
            'condition' =>  $uri_segments[2] == "Documentation"  ? 'true' : 'false' // Untuk membuat link sidebar active berdasarkan uri segment
        ),

    );
    return $data;
}

function doc()
{
    // Untuk Mendapatkan Uri segment
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);

    // Config Sidebar Sub-menu
    $data = array(
        array(
            'title'    => 'Documentation', // Title
            'link'     => 'Documentation', // Controller
            'condition' =>  $uri_segments[2] == "Documentation"  ? 'true' : 'false' // Untuk membuat link sidebar active berdasarkan uri segment
        ),
        array(
            'title'    => 'Demo', // Title
            'link'     => 'Demo', // Controller
            'condition' =>  $uri_segments[2] == "Demo"  ? 'true' : 'false' // Untuk membuat link sidebar active berdasarkan uri segment
        ),
    );
    return $data;
}
