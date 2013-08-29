<?php

return array(
    'admin/login'=>'admin/default/login',
    'admin/logout'=>'admin/default/logout',
    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);