<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function indexAction()
    {
        return new Response('It\'s default controller');
    }
}
