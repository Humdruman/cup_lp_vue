<?php

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
require_once ('lib/app/Register.php');
use App\Register;


Register::registerProductType();


add_action('init', 'formFeedback');
function formFeedback()
{
    register_post_type('form', array(
        'label' => 'Форма обратной связи',
        'public' => true,
        'show_in_rest' => true,
        'rest_base' => 'book',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ));
}