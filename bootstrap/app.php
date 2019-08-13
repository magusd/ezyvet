<?php

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Eloquent;
use Symfony\Component\Dotenv\Dotenv;

require '../vendor/illuminate/support/helpers.php';


/**
 * Class App
 */
class App
{
    /**
     * @var Container
     */
    protected static $container;

    /**
     * App constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->whoops();
        $this->env();

        // Create a service container
        self::$container = new Container();
        // Create a request from server variables, and bind it to the container; optional
        self::$container->singleton('app', 'Illuminate\Container\Container');
        $this->database();
//        $this->cache();
        $this->views();
    }

    public function database()
    {
        self::$container->singleton('eloquent', function () {
            $eloquent = new Eloquent;

            $eloquent->addConnection(array(
                'driver' => 'mysql',
                'host' => getenv('DB_HOST'),
                'database' => getenv('DB_DATABASE'),
                'username' => getenv('DB_USERNAME'),
                'password' => getenv('DB_PASSWORD'),
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => ''
            ));

            $eloquent->bootEloquent();
            return $eloquent;
        });
    }

    public function web()
    {
        $request = \Illuminate\Http\Request::capture();
        self::$container->instance('Illuminate\Http\Request', $request);
        // Using Illuminate/Events/Dispatcher here (not required); any implementation of
        // Illuminate/Contracts/Event/Dispatcher is acceptable
        $events = new \Illuminate\Events\Dispatcher(self::$container);
        // Create the router instance
        $router = new \Illuminate\Routing\Router($events, self::$container);
        $router->namespace('EzyVet\Controllers')->group(function() use ($router){
            // Load the routes
            require '../routes/web.php';
        });
        $response = $router->dispatch($request);
        // Send the response back to the browser
        $response->send();
    }

    /**
     * @param $alias
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function make($alias)
    {
        return self::$container->make($alias);
    }

    /**
     *
     */
    public function views()
    {
        self::$container->singleton('views',function(){
            return new League\Plates\Engine('../resources/views');
        });
    }

    /**
     * Setup for beautiful error page response using whoops
     */
    protected function whoops()
    {
        $run = new \Whoops\Run;
        $handler = new \Whoops\Handler\PrettyPageHandler;
        // Set the title of the error page:
        $handler->setPageTitle("Whoops! There was a problem.");

        $run->appendHandler($handler);

        if (\Whoops\Util\Misc::isAjaxRequest()) {
            $run->appendHandler(new \Whoops\Handler\JsonResponseHandler);
        }
        $run->register();
    }

    /**
     * Loads and sets up environment variables
     * @throws Exception
     */
    protected function env()
    {
        $dotenv = new Dotenv();
        $env_file = '../.env';
        if (!file_exists($env_file)) throw new Exception('Could not find .env file');
        $dotenv->load($env_file);
    }
}