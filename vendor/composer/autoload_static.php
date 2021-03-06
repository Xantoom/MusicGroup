<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb868e77306348972147e0e15686290c6
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb868e77306348972147e0e15686290c6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb868e77306348972147e0e15686290c6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb868e77306348972147e0e15686290c6::$classMap;

        }, null, ClassLoader::class);
    }
}
