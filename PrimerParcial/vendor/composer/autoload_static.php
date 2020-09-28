<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit21d9a66c56c23314e1565f43283f0179
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit21d9a66c56c23314e1565f43283f0179::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit21d9a66c56c23314e1565f43283f0179::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}