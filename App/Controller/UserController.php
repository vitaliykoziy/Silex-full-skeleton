<?php
namespace App\Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class UserController implements ControllerProviderInterface
{

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function connect(Application $app)
    {
        $userController = $app['controllers_factory'];
        $userController->get('/', [$this, 'indexAction'])->bind('user.index');
        $userController->get('/profile', [$this, 'profileAction'])->bind('user.profile');
        return $userController;
    }

    public function indexAction()
    {
        return $this->app['twig']->render('user/index.html.twig', array());

        /**
         * You can return JSON
         *
         * return $this->app->json(['hello'=>'it is a json']);
        */

    }

    public function profileAction()
    {
        return $this->app['twig']->render('user/profile.html.twig', array());
    }
}