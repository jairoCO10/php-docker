<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3e4460e3a50f9df2404b8ac2d75d7bb
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3e4460e3a50f9df2404b8ac2d75d7bb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3e4460e3a50f9df2404b8ac2d75d7bb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3e4460e3a50f9df2404b8ac2d75d7bb::$classMap;

        }, null, ClassLoader::class);
    }
}