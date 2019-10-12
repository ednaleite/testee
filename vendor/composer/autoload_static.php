<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf93d501153a3bf7357eaf7705da7c1be
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf93d501153a3bf7357eaf7705da7c1be::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf93d501153a3bf7357eaf7705da7c1be::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
