<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite711c63972db5b5d2160f4c4454f0a88
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite711c63972db5b5d2160f4c4454f0a88::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite711c63972db5b5d2160f4c4454f0a88::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite711c63972db5b5d2160f4c4454f0a88::$classMap;

        }, null, ClassLoader::class);
    }
}
