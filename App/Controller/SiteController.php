<?php
namespace App\Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class SiteController implements ControllerProviderInterface
{

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function connect(Application $app)
    {
        $siteController = $app['controllers_factory'];
        $siteController->get('/', [$this, 'indexAction'])->bind('homepage');
        return $siteController;
    }

    public function indexAction()
    {
        return $this->app['twig']->render('site/index.html.twig', array());
    }
}