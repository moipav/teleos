<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Request $request): Response
    {
        $greet = '';
        if ($name = $request->query->get('hello')) {
            $greet = sprintf('Hello %s!', htmlspecialchars($name));
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'greet' => $greet
        ]);
    }
}
