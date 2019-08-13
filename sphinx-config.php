<?php

return [
    'paths' => [
        'migrations' => 'database/migrations'
    ],
    'migration_base_class' => 'BaseMigration',
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
            'host' => getenv('DB_HOST'),
            'name' => getenv('DB_DATABASE'),
            'user' => getenv('DB_USERNAME'),
            'pass' => getenv('DB_PASSWORD'),
            'port' => 3306
        ]
    ]
];