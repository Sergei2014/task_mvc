<?php

return[
    '' => [
        'controller'  => 'main',
        'action' => 'index',
    ],
    'admin/login' => [
        'controller'  => 'admin',
        'action' => 'login',
    ],
    'admin/index' => [
        'controller'  => 'admin',
        'action' => 'index',
    ],
    'admin/edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
];
?>