<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\UniversityDegree;
use App\Entity\University;
use App\Entity\Degree;
use App\Form\UniversityDegreeType;
use Doctrine\ORM\EntityManagerInterface;

final class UniversityDegreeController extends AbstractController
{
    #[Route('/university/degree', name: 'app_university_degree')]
    public function index(): Response
    {
        return $this->render('university_degree/index.html.twig', [
            'controller_name' => 'UniversityDegreeController',
        ]);
    }
    // src/Controller/UniversityDegreeController.php
#[Route('/link', name: 'app_link')]
public function link(Request $request, EntityManagerInterface $em): Response
{
    $universityDegree = new UniversityDegree();
    $form = $this->createForm(UniversityDegreeType::class, $universityDegree);
    
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($universityDegree);
        $em->flush();
        
        $this->addFlash('success', 'Lien ajouté !');
        return $this->redirectToRoute('app_university_index');
    }

    return $this->render('university_degree/link.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
