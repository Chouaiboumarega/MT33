<?php

namespace App\Controller;

use App\Entity\Bilan;
use App\Entity\Facturation;
use App\Repository\BilanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\BilanType;
use App\Form\FacturationType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
     * @Route("/tracking", name="tracking")
     */
    public function tracking(): Response
    {
        return $this->render('accueil/tracking.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/brouillon", name="brouillon")
     */
    public function brouillon(): Response
    {
        return $this->render('accueil/brouillon.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/bilan", name="bilan")
     */
    public function bilan(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $bilan = new Bilan();
        $form = $this->createForm(BilanType::class, $bilan);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em ->persist($bilan);
            $em ->flush();
            $this->addFlash('success', 'Votre bilan a été pris en compte');
        return $this->redirectToRoute('bilan');
               
        }
        return $this -> render('accueil/bilan.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),
        ]
        );
 
       
    }
    /**
     * @Route("/facturation", name="facturation")
     */
    public function facturation(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $facturation = new facturation();
        $form = $this->createForm(FacturationType::class, $facturation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em ->persist($facturation);
            $em ->flush();
            $this->addFlash('success', 'Votre bilan a été pris en compte');
        return $this->redirectToRoute('facturation');
        }          

        return $this -> render('accueil/facturation.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),

        ]
        );
    }

    /**
     * @Route("/stats", name="stats")
     */
    public function statisstiques(BilanRepository $repo){

        $depenses= $repo->findAll();

        $mois=[];
        $depens=[];

        foreach($depenses as $depense){
            $mois[] = $depense->getclient();
            $depens[] = count($depense->getVolumes());
        }
        

        return $this->render('accueil/membre.html.twig'[
           

            ]);
    }
    
}
