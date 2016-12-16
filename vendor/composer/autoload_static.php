<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc17a8cac0ff2d40e1083039d71fe6cc
{
    public static $files = array (
        '6bc45d0537e6858fd179bdbc31d62c79' => __DIR__ . '/..' . '/raveren/kint/Kint.class.php',
    );

    public static $prefixesPsr0 = array (
        'Z' => 
        array (
            'Zeuxisoo\\Whoops\\Provider\\Slim\\WhoopsMiddleware' => 
            array (
                0 => __DIR__ . '/..' . '/zeuxisoo/slim-whoops/src',
            ),
        ),
        'W' => 
        array (
            'Whoops' => 
            array (
                0 => __DIR__ . '/..' . '/filp/whoops/src',
            ),
        ),
        'V' => 
        array (
            'Valitron' => 
            array (
                0 => __DIR__ . '/..' . '/vlucas/valitron/src',
            ),
        ),
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static $classMap = array (
        'BaseController' => __DIR__ . '/../..' . '/lib/base_controller.php',
        'BaseModel' => __DIR__ . '/../..' . '/lib/base_model.php',
        'DB' => __DIR__ . '/../..' . '/lib/database.php',
        'DatabaseConfig' => __DIR__ . '/../..' . '/config/database.php',
        'EmployeeController' => __DIR__ . '/../..' . '/app/controllers/employee_controller.php',
        'EmployerController' => __DIR__ . '/../..' . '/app/controllers/employer_controller.php',
        'HelloWorldController' => __DIR__ . '/../..' . '/app/controllers/hello_world_controller.php',
        'JobsController' => __DIR__ . '/../..' . '/app/controllers/jobs_controller.php',
        'Redirect' => __DIR__ . '/../..' . '/lib/redirect.php',
        'View' => __DIR__ . '/../..' . '/lib/view.php',
        'Whoops\\Module' => __DIR__ . '/..' . '/filp/whoops/src/deprecated/Zend/Module.php',
        'Whoops\\Provider\\Zend\\ExceptionStrategy' => __DIR__ . '/..' . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
        'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => __DIR__ . '/..' . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitcc17a8cac0ff2d40e1083039d71fe6cc::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitcc17a8cac0ff2d40e1083039d71fe6cc::$classMap;

        }, null, ClassLoader::class);
    }
}
