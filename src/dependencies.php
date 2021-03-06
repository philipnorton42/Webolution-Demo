<?php
/**
 * @file dependencies.php
 *
 * Dependency integration container configuration.
 */

// Set up the controller.
$container = $app->getContainer();

// Add logging via Monolog.
$container['logger'] = function ($container) {
    $settings = $container->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Register twig as the view component on the container.
$container['view'] = function ($container) {

    $settings = $container->get('settings')['renderer'];

    // Set 'cache' to be a path to enable it.
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => false
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

// Set up the database controller.
$container['database'] = function ($container) {
  $dbSettings = $container->get('settings')['database'];

  $database = new \PDO('sqlite:'. $dbSettings['databasefile'], '', '', array(\PDO::ATTR_PERSISTENT => false));
  //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $database;
};
