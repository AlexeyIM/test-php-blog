<?php

namespace App\Controller;

use Core\Controller\AbstractController;

/**
 * Class ErrorController
 * @package app\Controller
 */
class ErrorController extends AbstractController
{
    /**
     * 404 error page
     *
     * @return \Core\Http\Response
     */
    public function error404Action()
    {
        return $this->render('/view/error/404.php');
    }
}
