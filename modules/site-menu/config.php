<?php

return [
    '__name' => 'site-menu',
    '__version' => '0.2.1',
    '__git' => 'git@github.com:getmim/site-menu.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/site-menu' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-model' => NULL
            ],
            [
                'lib-cache' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteMenu\\Model' => [
                'type' => 'file',
                'base' => 'modules/site-menu/model'
            ],
            'SiteMenu\\Library' => [
                'type' => 'file',
                'base' => 'modules/site-menu/library'
            ]
        ],
        'files' => []
    ],
    'libFormatter' => [
        'formats' => [
            'site-menu' => [
                'id' => [
                    'type' => 'number'
                ],
                'user' => [
                    'type' => 'object',
                    'model' => [
                        'name' => 'LibUser\\Library\\Fetcher',
                        'field' => 'id',
                        'type' => 'number'
                    ],
                    'format' => 'user'
                ],
                'name' => [
                    'type' => 'text'
                ],
                'content' => [
                    'type' => 'json'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ]
        ]
    ],
    'libEvent' => [
        'events' => [
            'site-menu:updated' => [
                'SiteMenu\\Library\\Event::clear' => true
            ]
        ]
    ]
];
