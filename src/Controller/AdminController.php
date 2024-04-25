<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EditUserType;
use App\Repository\BilanRepository;
use Symfony\Component\HttpFoundation\User;
use App\Repository\UserRepository;
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
    
        
}
