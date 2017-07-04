<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 04/07/2017
 * Time: 19:45
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Helper\UserHelper;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @return Response
     */

    public function registerAction(Request $request){
        $username = $request->request->get("username");
        $password = $request->request->get("password");
        $confPassword = $request->request->get("confPassword");
        $em = $this->getDoctrine()->getManager();
        if ($request->request->get("submit")) {
            if($username && $password && $confPassword){
                if ($password === $confPassword) {
                    if(!UserHelper::getUser($username,$em)) {
                        // Register
                        UserHelper::addUser($username,$password,$em);
                        echo $username." account successfully created!";
                    }
                    else {
                        echo "Username already exists.";
                    }
                }
                else {
                    echo "The passwords do not match.";
                }
            }
            else{
                echo "Please make sure all fields are filled in.";
            }
        }

        return $this->render("login/register.html.twig");
    }
}