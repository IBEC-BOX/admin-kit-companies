<?php

return [
    'resource' => [
        'label' => 'Company',
        'plural_label' => 'Companies',

        'id' => 'ID',
        'title' => 'Title',
        'background' => 'Background',
        'general' => 'General',
        'description' => 'Description',
        'history' => 'History',
        'mission' => 'Mission',
        'attachments' => 'Attachments',

        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ],

    'relations' => [
        'managers' => [
            'label' => 'Management',
            'plural_label' => 'Managements',

            'photo' => 'Photo',
            'name' => 'Name',
            'bio' => 'Bio',
            'about_me' => 'About Me',

            'created_at' => 'Created At',
        ],

        'histories' => [
            'label' => 'History',
            'plural_label' => 'Histories',

            'date' => 'Date',
            'title' => 'Title',
            'description' => 'Description',

            'created_at' => 'Created At',
        ],
    ],
];
