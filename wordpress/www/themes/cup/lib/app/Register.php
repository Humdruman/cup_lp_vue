<?php


namespace App;


class Register
{
    public static function registerProductType() {
        add_action('init', function () {
            $args = [
                'label' => 'Товары',
                'labels' => [
                    'name' => 'Товары',
                    'singular_name' => 'Товар',
                    'add_new_item' => 'Добавить новый товар',
                    'edit_item' => 'Редактировать товар',
                    'new_item' => 'Новый товар',
                    'view_item' => 'Посмотреть товар',
                    'search_items' => 'Найти товары',
                    'not_found' => 'Товары не были найдены'

                ],
                'public' => true,
                'show_in_menu' => true,
                'show_in_admin_bar' => true,
                'show_in_rest' => true,
                'menu_position' => '4',
                'supports' => ['title']
            ];
            register_post_type('product', $args);
        });

    }
}