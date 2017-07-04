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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return Response
     */

    public function loginAction(Request $request)
    {
        if ($request->request->get("submit")) {
            $user = UserHelper::getUser($request->request->get("username"), $this->getDoctrine()->getManager());
            if ($user) {
                if (UserHelper::checkPassword($request->request->get("password"), $user)) {
                    echo "Correct password.";
                } else {
                    echo "Incorrect password.";
                }
            } else {
                echo "No user found.";
            }
        }

        return $this->render("login/login.html.twig", [
            "user" => $user ?? null
        ]);
    }
}