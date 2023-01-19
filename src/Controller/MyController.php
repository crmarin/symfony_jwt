<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

/**
 * @Route("/api", name="api_")
 */
class MyController extends AbstractController
{
    /**
     * @Route("/register", name="register_user", methods={"POST"})
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $em = $this->getDoctrine()->getManager();
        $decoded = json_decode($request->getContent());
        $email = $decoded->email;
        $password = $decoded->password;
        
        $user = new User();
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $em->persist($user);
        $em->flush();

        return $this->json('Register ok ');
    }

    /**
     * @Route("/list", name="list_users", methods={"GET"})
     */
    public function list(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $em = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        $data = [];

        foreach ($em as $user) {
            $data[] = [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'roles' => $user->getRoles(),
            ];
        }


        return $this->json($data);
    }
}
