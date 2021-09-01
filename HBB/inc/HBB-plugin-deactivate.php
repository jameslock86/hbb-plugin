<?php

/** @package HBB Plugin
 */

 class HBBPluginDeactivate
 {

    public static function Deactivate(){
        flush_rewrite_rules();
    }
 }