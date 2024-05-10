<?php

namespace App\Controller;

use App\Form\ChauffeurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EditUserType;
use App\Form\VehiculeType;
use App\Repository\BilanRepository;
use App\Repository\ChauffeursRepository;
use Symfony\Component\HttpFoundation\User;
use App\Repository\UserRepository;
use App\Repository\VehiculeRepository;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
 
    /**
     * @Route("/user", name="user")
     */
    public function userList(UserRepository $repo): Response
    {
        return $this->render('admin/users.html.twig', [
            'users'=> $repo->findAll(),
           
        ]);
    }
    
/**
 * @Route("/edituser/{id}", name="edituser")
 */
public function edituser(Request $request,UserRepository $repo,$id)
{
        $users=$repo->find($id);
        $form = $this->createForm(EditUserType::class, $users);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $sendDatabase=$this->getDoctrine()
                               ->getManager();
            $sendDatabase->persist($users);
            $sendDatabase->flush();                      
            $this->addFlash('notice','modification reussie!!');
            return $this->redirectToRoute('admin');
        }
        return $this->render('admin/edituser.html.twig', [
            'controller_name' => 'AdminController',
            'editUserForm'=> $form->createView() 
        ]);
    }
    /**
 * @Route("/editeuser/{id}", name="editeuser")
 */
public function editeuser(Request $request,UserRepository $repo,$id)
{
        $user=$repo->find($id);
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $sendDatabase=$this->getDoctrine()
                               ->getManager();
            $sendDatabase->persist($user);
            $sendDatabase->flush();                      
            $this->addFlash('notice','modification reussie!!');
            return $this->redirectToRoute('admin');
        }
        return $this->render('admin/editeuser.html.twig', [
            'controller_name' => 'AdminController',
            'editUserForm'=> $form->createView() 
        ]);
    }
     /**
     * @Route("/deleteuser/{id}", name="deleteuser")
     */
    public function delete(Request $request, UserRepository $repo,$id): Response
    {
        $users=$repo->find($id);
        $sendDatabase=$this->getDoctrine()
                           ->getManager();
        $sendDatabase->remove($users);
        $sendDatabase->flush();                      
        $this->addFlash('notice','suppression reussie!!');
        return $this->redirectToRoute('membre');
    }
    
    /**
     * @Route("/transporteur/{id}", name="transporteur")
     */
    public function transporteur($id,UserRepository $repo)
    {
   
        $transporteur= $repo->find($id);

        return $this->render('Admin/transporteur.html.twig', [
            'controller_name' => 'AdminController',
            "transporteur"=>$transporteur,
        ]) ;
    }
     /**
     * @Route("/transporteur1/{id}", name="transporteur1")
     */
    public function transporteur1($id,VehiculeRepository $repo)
    {
   
        $transporteur1= $repo->find($id);

        return $this->render('Admin/transporteur1.html.twig', [
            'controller_name' => 'AdminController',
            "transporteur1"=>$transporteur1,
        ]) ;
    }
    /**
     * @Route("/transporteur2/{id}", name="transporteur2")
     */
    public function transporteur2($id,ChauffeursRepository $repo)
    {
   
        $transporteur2= $repo->find($id);

        return $this->render('Admin/transporteur2.html.twig', [
            'controller_name' => 'AdminController',
            "transporteur2"=>$transporteur2,
        ]) ;
    }
    
    /**
     * @Route("/vehicules", name="vehicules")
     */
    public function vehicules(VehiculeRepository $repo): Response
    {
        return $this->render('admin/vehicules.html.twig', [
            'vehicules'=> $repo->findAll(),
           
        ]);
    }
/**
 * @Route("/editvehicule/{id}", name="editvehicule")
 */
public function editvehicule(Request $request,VehiculeRepository $repo,$id)
{
        $vehicules=$repo->find($id);
        $form = $this->createForm(VehiculeType::class, $vehicules);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $sendDatabase=$this->getDoctrine()
                               ->getManager();
            $sendDatabase->persist($vehicules);
            $sendDatabase->flush();                      
            $this->addFlash('notice','!!');
            return $this->redirectToRoute('vehicules');
        }
        return $this->render('admin/editvehicule.html.twig', [
            'controller_name' => 'AdminController',
            'editVehiculeForm'=> $form->createView() 
        ]);
    }
 /**
     * @Route("/deletevehicule/{id}", name="deletevehicule")
     */
    public function deletevehicule(Request $request, VehiculeRepository $repo,$id): Response
    {
        $vehicules=$repo->find($id);
        $sendDatabase=$this->getDoctrine()
                           ->getManager();
        $sendDatabase->remove($vehicules);
        $sendDatabase->flush();                      
        $this->addFlash('notice','s');
        return $this->redirectToRoute('vehicules');
    }


   /**
     * @Route("/chauffeurs", name="chauffeurs")
     */
    public function chauffeurs(ChauffeursRepository $repo): Response
    {
        return $this->render('admin/chauffeurs.html.twig', [
            'chauffeurs'=> $repo->findAll(),
           
        ]);
    }
    /**
 * @Route("/editchauffeur/{id}", name="editchauffeur")
 */
public function editchauffeur(Request $request,ChauffeursRepository $repo,$id)
{
        $chauffeurs=$repo->find($id);
        $form = $this->createForm(ChauffeurType::class, $chauffeurs);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $sendDatabase=$this->getDoctrine()
                               ->getManager();
            $sendDatabase->persist($chauffeurs);
            $sendDatabase->flush();                      
            $this->addFlash('notice','!!');
            return $this->redirectToRoute('chauffeurs');
        }
        return $this->render('admin/editchauffeur.html.twig', [
            'controller_name' => 'AdminController',
            'editChauffeurForm'=> $form->createView() 
        ]);
    }
/**
     * @Route("/deletechauffeur/{id}", name="deletechauffeur")
     */
    public function deletechauffeur(Request $request, ChauffeursRepository $repo,$id): Response
    {
        $chauffeurs=$repo->find($id);
        $sendDatabase=$this->getDoctrine()
                           ->getManager();
        $sendDatabase->remove($chauffeurs);
        $sendDatabase->flush();                      
        $this->addFlash('notice','');
        return $this->redirectToRoute('chauffeurs');
    }

}
