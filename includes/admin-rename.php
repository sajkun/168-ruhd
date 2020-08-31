<?php

add_action( 'init', 'change_post_labels' );


function change_post_labels() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Smile Stories';
    $labels->singular_name = 'Smile Stories';
    $labels->add_new = 'Add Smile Story';
    $labels->add_new_item = 'Add Smile Story';
    $labels->edit_item = 'Edit smile story';
    $labels->new_item = 'Smile Stories';
    $labels->view_item = 'View Smile Story';
    $labels->search_items = 'Search Smile Stories';
    $labels->not_found = 'No  Smile Stories found';
    $labels->not_found_in_trash = 'No  Smile Stories found in Trash';
    $labels->all_items = 'All  Smile Stories';
    $labels->menu_name = ' Smile Stories';
    $labels->name_admin_bar = ' Smile Stories';
}