<?php
    #配置文件
    return array(
        'app'=>array(
            'dp'=>'Admin',#默认平台
            'dc'=>'login',#默认控制器
            'da'=>'load'#默认方法
        ),
        'login'=>array(
            'dc'=>'notes',
            'da'=>'lobby'
        ),
        'db'=>array(
            'type'=>'mysql',
            'host'=>'127.0.0.1',
            'port'=>3306,
            'dbn'=>'cloudnote',
            'user'=>'root',
            'pwd'=>'123456'
        )
    );
