<?php

/** @package HBB Plugin
 */

namespace Inc;

 class Deactivate
 {

    public static function Deactivate(){
        flush_rewrite_rules();
    }
 }

 

 
