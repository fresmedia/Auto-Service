<?php
return [
    'raw_permissions' => [
        // 'settings' => ['view', 'edit'],
        'permission' => ['view','create','edit','delete'],
        'admin' => ['view','create','edit','delete'],
        'admin_profile' => ['view','edit'],
        'role' => ['view','create','edit','delete'],
        'user' => ['view','create','edit','delete'],
        // 'category' => ['view','create','edit','delete'],
        // 'page' => ['view','create','edit','delete'],
        // 'blog' => ['view','create','edit','delete'],
        // 'slider' => ['view','create','edit','delete'],
        // 'tracking' => ['view','delete'],
        'email_notification' => ['view','edit'],
        'email_message' => ['view','edit'],
        // 'module' => ['view','create','edit','delete','toggle'],
        'dashboard' => ['view'],
        // 'advertisement' => ['view','create','edit','delete'],
        // 'word' => ['view','create','edit','delete'],
        // 'sentence' => ['view','create','edit','delete'],
        // 'translation' => ['create','edit','all_language','word','sentence','term','page'],
        // 'contact' => ['view', 'create'],
        'location' => ['view','create','edit','delete'],
        'service' => ['view','create','edit','delete'],
    ]
];