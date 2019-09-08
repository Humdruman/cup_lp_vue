<?php
/*
Plugin Name: Обратный звонок
Description: Плагин для обработки формы обратного звонка и вывода заполненных полей
Version: 1.0
Author: Humdruman
*/
$db_name = 'cup_feedback';
require_once 'rest-api.php';

register_activation_hook(__FILE__, 'feedbackActivePlugin');

function feedbackActivePlugin() {
    global $wpdb;
    global $db_name;

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $sql = "
        CREATE TABLE `" . $db_name . "` (
        `ID` INT(10) UNSIGNED NULL AUTO_INCREMENT,
        `name` VARCHAR(255) NOT NULL DEFAULT '0',
        `phone` TEXT NOT NULL,
        `review_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`ID`)
    );";
    if ($wpdb->get_var("show tables like '" . $db_name . "'") != $db_name) {
        dbDelta($sql);
    }
}

register_uninstall_hook(__FILE__, 'feedbackUninstallPlugin');

function feedbackUninstallPlugin() {
    global $wpdb;
    global $db_name;
    $wpdb->query("DROP TABLE IF EXISTS {$db_name}");
}

if(is_admin()) {
    add_action('admin_menu', 'feedbackAdminMenuPlugin');
    function feedbackAdminMenuPlugin() {
        add_menu_page('Обратный звонок', 'Обратный звонок', 'manage_options', 'feedback', 'feedbackMenuView');
    }

    function feedbackMenuView() {
        global $wpdb;
        global $db_name;
        $feedbackData = $wpdb->get_results("SELECT * FROM `" . $db_name . "`", ARRAY_A);

        // Подключаем страницу для отображения результатов
        include_once('view.php');
    }
}