<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcbd882dbf26e5e0c1807b2ff2228ad0
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcbd882dbf26e5e0c1807b2ff2228ad0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcbd882dbf26e5e0c1807b2ff2228ad0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcbd882dbf26e5e0c1807b2ff2228ad0::$classMap;

        }, null, ClassLoader::class);
    }
}