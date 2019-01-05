<?php
/**
 * Created by PhpStorm.
 * User: Tareq
 * Date: 04/09/2016
 * Time: 10:00 PM
 */


$admin_menu = [
    'Dashboard' => [
        'menu_link' => 'dashboard',
        'menu_icon' => 'home'
    ],

    'Manage Numbers' => [
        'menu_icon' => 'phone',
        'sub_items' => [
            'Add Numbers' => [
                'menu_link' => 'manage_numbers',
                'menu_icon' => 'account-box-phone',
            ],
            'All numbers' => [
                'menu_link' => 'view_numbers',
                'menu_icon' => 'accounts-outline'
            ]

        ]
    ],

    'Manage SMS' => [
        'menu_icon' => 'email',
        'sub_items' => [
            'Send SMS' => [
                'menu_link' => 'manage_sms',
                'menu_icon' => 'mail-send',
            ],
            'All sent sms' => [
                'menu_link' => 'view_sms',
                'menu_icon' => 'mail-reply'
            ]

        ]
    ],

    'Manage Users' => [
        'menu_icon' => 'account',
        'sub_items' => [
            'Add User' => [
                'menu_link' => 'add_users',
                'menu_icon' => 'account-add',
            ],
            'All user' => [
                'menu_link' => 'all_users',
                'menu_icon' => 'accounts-list',
            ]

        ]
    ],

    'Manage System' => [
        'menu_link' => 'system_settings',
        'menu_icon' => 'settings'
    ],

];

function enque_admin_menu(){
    global $admin_menu;

    $menu = '';

    foreach( $admin_menu as $i => $menu_item ){
        $menu .= '<li class="sidebar-menu-item">';

        if($menu_item['sub_items'] && is_array($menu_item['sub_items'])){
            $menu .= '<a class="sidebar-menu-button" href="javascript:"><i class="sidebar-menu-icon devs devs-'. $menu_item['menu_icon'] .'"></i> ' . $i . '</a><ul class="sidebar-submenu">';
                foreach($menu_item['sub_items'] as $s => $subs){
                    $menu .= '<li class="sidebar-menu-item"><a class="sidebar-menu-button" href="/admin/' . $subs['menu_link'] . '"><i class="sidebar-menu-icon devs devs-'. $subs['menu_icon'] .'"></i> ' . $s . '</a></li>';
                }
            $menu .= '</ul>';
        }
        else {
            $menu .= '<a class="sidebar-menu-button" href="/admin/' . $menu_item['menu_link'] . '"><i class="sidebar-menu-icon devs devs-'. $menu_item['menu_icon'] .'"></i> ' . $i . '</a>';
        }

        $menu .= '</li>';
    }

    return $menu;

}

function pre($content,$varDump=false){
    echo '<div style="padding:20px; border: 1px solid #ff0000;"><pre style="word-wrap: break-word; white-space: pre-wrap;">';
    $varDump ? var_dump($content) : print_r($content);
    echo '</pre></div>';
}

function notify($alert = []){
    global $config;
    $notify[] = $alert;
    return $notify;
}