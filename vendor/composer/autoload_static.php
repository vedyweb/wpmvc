<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c2892e6dd0404642c26cda9fd9f2dda
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VEDYWEB\\WPMVC\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VEDYWEB\\WPMVC\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1c2892e6dd0404642c26cda9fd9f2dda::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1c2892e6dd0404642c26cda9fd9f2dda::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1c2892e6dd0404642c26cda9fd9f2dda::$classMap;

        }, null, ClassLoader::class);
    }
}
