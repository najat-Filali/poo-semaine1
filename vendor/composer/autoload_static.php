<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd1d58b748e0cf33da1bec81f6cbdbdc5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd1d58b748e0cf33da1bec81f6cbdbdc5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd1d58b748e0cf33da1bec81f6cbdbdc5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
