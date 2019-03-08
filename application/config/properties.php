<?php
	$config["properties"] = [
        'index' => 
            [
                'title' => "TheContainer",
                'label' => 'Index Page'
            ],
        'panel' =>
            [
                'title' => 'TheContainer: Main Panel',
                'label' => 'Main Panel'
            ]
    ];

    $config["fileBundles"] = [
        'defaultAll' => [
            'css' => [
                "assets/css/bootstrap.min.css",
                "public/css/main.css"
            ],
            'js' => [
                //""
            ]
        ]
    ];

?>