<?php 

return array(  
    //recommend为我们计划定时执行的方法文件,2是间隔时间，nextruntime下次执行时间  
    //此文件位于/Application/Cron/目录下  
    'cron' => array('recommend', 60, ''),  
);  


?>