<?php

return[

    'settings'=>[
        'displayErrorDetails' => true,
        'determineRouterBeforeAppMiddleware' => false,
        'template_path' => __DIR__ . '/templates/',

        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'hospital_management_system_api',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],

    ],

];
