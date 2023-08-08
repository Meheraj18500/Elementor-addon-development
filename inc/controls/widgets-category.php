<?php

// Register A Elementor Widget Category
function meheraj_addon_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'meheraj_widget',
        [
            'title' => esc_html__( 'Meheraj widgets', 'meheraj-addon' ),
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'meheraj_addon_widget_categories' );