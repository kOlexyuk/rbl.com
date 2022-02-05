<?php

return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=exchange_db',
            'username' => 'root',
            'password' => 'true',
            'tablePrefix' => '',
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
    ],
];
 