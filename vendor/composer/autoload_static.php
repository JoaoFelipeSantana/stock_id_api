<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit983e951260a1037611ce7715f6eee751
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit983e951260a1037611ce7715f6eee751::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit983e951260a1037611ce7715f6eee751::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit983e951260a1037611ce7715f6eee751::$classMap;

        }, null, ClassLoader::class);
    }
}
