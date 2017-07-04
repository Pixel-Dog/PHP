<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/07/2017
 * Time: 20:50
 */

namespace AppBundle\Helper;


use AppBundle\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserHelper
{
    public static function getUser($username, ObjectManager $em)
    {
        $user = $em->getRepository("AppBundle:User")->findOneBy(["username" => $username]);
        return $user;
    }

    public static function checkPassword($password, User $user)
    {
        if ($user->getPassword() === $password)
        {
            return true;
        }
        return false;
    }

    /**
     * Adds a user to database
     *
     *
     * @param $username
     * @param $password
     * @param ObjectManager $em
     */

    public static function addUser($username, $password, ObjectManager $em)
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $em->persist($user);
        $em->flush();
    }
}