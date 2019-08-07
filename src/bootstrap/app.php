<?php
use Symfony\Component\Dotenv\Dotenv;

define('BASE_PATH',str_replace('src\bootstrap','',__DIR__));
define('DS',DIRECTORY_SEPARATOR);

class App{
    public function __construct()
    {
        require BASE_PATH.DS.'src'.DS.'helpers'.DS.'paths.php';
        require BASE_PATH.DS.'src'.DS.'helpers'.DS.'env.php';
        $this->env();
    }

    protected function env()
    {
        $dotenv = new Dotenv();
        $env_file = base_path().'.env';
        if(!file_exists($env_file)) throw new Exception('Could not find .env file');
        $dotenv->load($env_file);
    }
}