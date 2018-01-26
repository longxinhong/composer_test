<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb90cecc8880558b40043cb333d72e323
{
    public static $files = array (
        'af9823f214dc60be1147b5d07eb0e284' => __DIR__ . '/../..' . '/core/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
        'a' => 
        array (
            'api\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'api\\' => 
        array (
            0 => __DIR__ . '/../..' . '/api',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb90cecc8880558b40043cb333d72e323::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb90cecc8880558b40043cb333d72e323::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
