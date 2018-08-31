<?php
return array(     // 添加下面一行定义即可     
 'app_begin' => array('Behavior\CheckLangBehavior'),   
 'app_begin' => array('Behavior\CronRunBehavior'),
 'admin_begin' => array(
        'Common\Behavior\AdminDefaultLangBehavior'
    )
);