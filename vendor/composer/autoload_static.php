<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3bf23009839bba98452d9f9c8b50f70
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3bf23009839bba98452d9f9c8b50f70::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3bf23009839bba98452d9f9c8b50f70::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd3bf23009839bba98452d9f9c8b50f70::$classMap;

        }, null, ClassLoader::class);
    }
}
