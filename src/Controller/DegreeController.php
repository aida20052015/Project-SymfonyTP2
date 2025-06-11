<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DegreeController extends AbstractController
{
    #[Route('/degree', name: 'app_degree')]
    public function index(): Response
    {
        return $this->render('degree/index.html.twig', [
            'controller_name' => 'DegreeController',
        ]);
    }
}
