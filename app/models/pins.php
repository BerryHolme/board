<?php

namespace models;

use DB\Cortex;
class pins extends Cortex
{
    protected
        $db ='DB',
        $table = 'pins';

    protected $fieldConf=[

        'id'=>['type'=>'INT', 'nullable'=>false],
        'content'=>['type' => 'TEXT', 'nullable'=>false],
        'author' => ['type'=>'TEXT', 'nullable'=>false],
        'color' => ['type' => 'CHAR6', 'nullable'=>false]
    ];

}