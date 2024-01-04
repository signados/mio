<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Token;


#[Route('api/user')]
class ApiUserController extends AbstractController
{
    #[Route('/info', name: 'api_app_user_info_get', methods: ['GET'])]
    public function index(Token $Token, Request $request, UserRepository $userRepository): Response
    {

        $email = $Token->decode($request->headers->get('Authorization'));
        $user = $userRepository->findOneByEmail($email);

        if(!$user) {
                return $this->redirectToRoute('app_login');
        }
        
        $response = new Response();
        $response->setContent(json_encode([
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'surname' => $user->getName(),
            'age' => $user->getAge(),
        ]));
                
        $response->headers->set('Content-Type', 'application/json');
        return $response; 
    }

    #[Route('/info', name: 'api_app_user_info_post', methods: ['POST'])]
    public function new(Token $Token, Request $request, UserRepository $userRepository): Response
    {
        $email = $Token->decode($request->headers->get('Authorization'));
        $user = $userRepository->findOneByEmail($email);

        if(!$user) {
                return $this->redirectToRoute('app_login');
        }

        $content = $request->getContent();
        $datos = json_decode($content, true);

        $user->setName($datos['name']);
        $user->setAge($datos['age']);
        $user->setSurname($datos['surname']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $response = new Response();
        $response->setContent(json_encode([
            'email' => $user->getEmail(),
            'name' => $user->getName(),
            'surname' => $user->getName(),
            'age' => $user->getAge(),
        ]));
                
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}