<?php

add_action('rest_api_init', 'feedbackPluginRestApiInit');

function feedbackPluginRestApiInit() {
    $namespace = 'feedback/v1';

    register_rest_route( $namespace,
        '/add',
        [
            'methods'  => 'POST',
            'callback' => 'feedbackPluginRestApiCreate',
            'args' => [
                'feedback_name' => [
                    'type' => 'string',
                    'required' => true
                ],
                'feedback_phone' => [
                    'type' => 'string',
                    'required' => true
                ]
            ]
        ]
    );
}

function feedbackPluginRestApiCreate(WP_REST_Request $request) {
    global $wpdb;

    $response = array(
        'feedback_name' => $request->get_param('feedback_name'),
        'feedback_phone' => $request->get_param('feedback_phone'),
    );

    $wpdb->insert('cup_feedback', ['name' => $response['feedback_name'], 'phone' => $response['feedback_phone']]);

    return $response;
}
