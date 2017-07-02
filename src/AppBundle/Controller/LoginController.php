<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/07/2017
 * Time: 19:56
 */

namespace AppBundle\Controller;


use AppBundle\Helper\UserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */

    public function loginAction(Request $request)
    {
        $userHelper = new UserHelper();
        $user = $userHelper->getUser($request->request->get("username"), $this->getDoctrine()->getManager());
        dump($user);
        return $this->render("login/login.html.twig", [
            "user" => $user,
        ]);
    }
}