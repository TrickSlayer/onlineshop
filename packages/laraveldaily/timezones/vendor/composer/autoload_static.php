<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd62fa6f55fba9bf7582e187d3b1143a2
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Laraveldaily\\Timezones\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Laraveldaily\\Timezones\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd62fa6f55fba9bf7582e187d3b1143a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd62fa6f55fba9bf7582e187d3b1143a2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd62fa6f55fba9bf7582e187d3b1143a2::$classMap;

        }, null, ClassLoader::class);
    }
}
