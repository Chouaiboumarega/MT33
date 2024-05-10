<?php

namespace App\Controller;

use App\Entity\Bilan;
use App\Entity\Facturation;
use App\Entity\Vehicule;
use App\Entity\Chauffeurs;
use App\Entity\Contact;
use App\Repository\BilanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\BilanType;
use App\Form\ChauffeurType;
use App\Form\ContactType;
use App\Form\FacturationType;
use App\Form\VehiculeType;
use App\Repository\ChauffeursRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
     * @Route("/plan", name="plan")
     */
    public function plan(): Response
    {
        return $this->render('accueil/plan.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $cont, SluggerInterface $slugger): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $cont ->persist($contact);
            $cont ->flush();
            $this->addFlash('success', 'Votre bilan a été pris en compte');
        return $this->redirectToRoute('app_accueil');
               
        }
        return $this -> render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),
        ]
        );
 
       
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
     * @Route("/vehicule", name="vehicule")
     */
    public function vehicule(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $vehicule = new vehicule();
        $form = $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em ->persist($vehicule);
            $em ->flush();
            $this->addFlash('success', 'Votre bilan a été pris en compte');
        return $this->redirectToRoute('vehicules');
        }          

        return $this -> render('accueil/vehicule.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),

        ]
        );
    }
    /**
     * @Route("/chauffeur", name="chauffeur")
     */
    public function chauffeur(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $chauffeur = new chauffeurs();
        $form = $this->createForm(ChauffeurType::class, $chauffeur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em ->persist($chauffeur);
            $em ->flush();
            $this->addFlash('success', '');
        return $this->redirectToRoute('chauffeurs');
        }          

        return $this -> render('accueil/chauffeur.html.twig', [
            'controller_name' => 'AccueilController',
            'form' => $form->createView(),
        ]
        );
    }
      /**
     * @Route("/nombre", name="nombre")
     */
    public function nombreIds(): Response
    {
        // Obtenez le gestionnaire d'entités (EntityManager)
        $entityManager = $this->getDoctrine()->getManager();

        // Obtenez le dépôt (repository) pour l'entité
        $repository = $entityManager->getRepository(Chauffeurs::class);

        // Comptez le nombre d'entités dans la table
        $nombreIds = $repository->createQueryBuilder('e')
            ->select('COUNT(e.id) as total_ids')
            ->getQuery()
            ->getSingleScalarResult();

        // Affichage du résultat
        return $this->render('accueil/nombre.html.twig', [
            'nombreIds' => $nombreIds,
        ]);
    }
}
