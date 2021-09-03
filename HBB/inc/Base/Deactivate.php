<?php

/** @package HBB Plugin
 */

namespace Inc\Base;

 class Deactivate
 {

    public static function Deactivate(){
        flush_rewrite_rules();
    }
 }

 

 
