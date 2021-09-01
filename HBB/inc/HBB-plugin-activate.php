<?php

/** @package HBB Plugin
 */

 class HBBPluginActivate
 {

    public static function activate(){
        
        flush_rewrite_rules();
    }
 }