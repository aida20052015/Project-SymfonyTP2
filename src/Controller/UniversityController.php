<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UniversityDegreeRepository;
use App\Entity\University; 
final class UniversityController extends AbstractController
{
    #[Route('/university', name: 'app_university')]
    public function index(): Response
    {
        return $this->render('university/index.html.twig', [
            'controller_name' => 'UniversityController',
        ]);
    }
    #[Route('/university/{id}', name: 'university_show')]
public function show(University $university, UniversityDegreeRepository $repo): Response
{
    $degrees = $repo->findBy(['university' => $university]);
    return $this->render('university/show.html.twig', [
        'university' => $university,
        'degrees' => $degrees,
    ]);
}
}
