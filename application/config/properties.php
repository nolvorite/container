<?php
    $config["site"] = [
        'title' => 'TheContainer'
    ];
	$config["properties"] = [
        'index' => 
            [
                'title' => $config['site']['title'],
                'label' => 'Index Page'
            ],
        'panel' =>
            [
                'title' => $config['site']['title'].': Main Panel',
                'label' => 'Main Panel'
            ]
    ];

    $config["userContentTemplate"] = [
        'notes' => 'dynamic/templates/notes.php'
    ];

    $config["dynamicControllerUrls"] = [
        'notes' => ['#/panel/notes/',"Notes/Checklist"],
        'admin' => ['#/panel/admin/',"Admin Panel"],
        'forms' => ['#/panel/forms',"Forms/Database Tables"],
        'users' => ['#/panel/users',"Manage Users"],
        'settings/personal' => ['#/panel/settings/personal',"Personal Settings"],
        'settings/general' => ['#/panel/settings/general',"General Settings"]
    ];

    $config["fileList"] = [
        'homeindex' => 
            [
                "user" => ["main.php"],
                "guest" => ["login.php","promotion1.php"]
            ]
    ];

    
    $config["fileBundles"] = [
        'defaultAll' => [
            'css' => [
                //"https://use.fontawesome.com/releases/v5.7.2/css/all.css",
                "assets/css/bootstrap.min.css",
                "assets/css/jquery.datetimepicker.css",
                "public/css/main.css"
            ],
            'js' => [
                "assets/js/jquery-3.3.1.min.js",
                "assets/js/jquery.datetimepicker.min.js",
                "assets/js/popper.min.js",
                "assets/js/bootstrap.min.js",
                "public/js/containerCore.js",
                "public/js/containerMethods.js",
                "public/js/containerController.js",
                "https://use.fontawesome.com/releases/v5.7.2/js/all.js",
                "assets/js/jquery.sortable.min.js",
                "public/js/container.js"
            ]
        ]
    ];

?>