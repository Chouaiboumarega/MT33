<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/membre", name="membre")
     */
    public function membre(): Response
    {
        return $this->render('accueil/membre.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/bilan", name="bilan")
     */
    public function bilan(): Response
    {
        return $this->render('accueil/bilan.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
