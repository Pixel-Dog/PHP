<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/07/2017
 * Time: 20:50
 */

namespace AppBundle\Helper;


use Doctrine\Common\Persistence\ObjectManager;

class UserHelper
{
    public function getUser($username, ObjectManager $em)
    {
        $user = $em->getRepository("AppBundle:User")->findOneBy(["username" => $username]);
        return $user;
    }
}