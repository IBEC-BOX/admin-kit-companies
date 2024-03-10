<?php

return [
    'resource' => [
        'label' => 'Компания',
        'plural_label' => 'Компании',

        'id' => 'ID',
        'title' => 'Заголовок',
        'background' => 'Фон',
        'general' => 'Основное',
        'description' => 'Описание',
        'history' => 'История',
        'mission' => 'Миссия',
        'attachments' => 'Вложения',

        'created_at' => 'Создан',
        'updated_at' => 'Обновлен',
    ],

    'relations' => [
        'managers' => [
            'label' => 'Руководитель',
            'plural_label' => 'Руководство',

            'photo' => 'Фото',
            'name' => 'Имя',
            'bio' => 'Био',
            'about_me' => 'Обо мне',

            'created_at' => 'Создан',
        ],

        'histories' => [
            'label' => 'История',
            'plural_label' => 'Истории',

            'title' => 'Заголовок',
            'description' => 'Описание',

            'created_at' => 'Создан',
        ],
    ],
];
