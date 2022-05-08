<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Section;
use App\Form\EtudiantType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/etudiant')]
class EtudiantController extends AbstractController
{
    #[Route('/', name: 'affiche.etudiant')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo=$doctrine->getRepository(Etudiant::class);
        $liste=$repo->findAll();
        return $this->render('etudiant/liste.html.twig', [
            'liste' => $liste,
        ]);
    }
    #[Route('/add/', name: 'ajouter.etudiant')]
    public function indexajout(Etudiant $etudiant=null,Request $req ,ManagerRegistry $doctrine): Response{
        if(!$etudiant){
            $etudiant= new Etudiant();
        }
        $manager = $doctrine->getManager();
        $form=$this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($req);
        if ($form->isSubmitted()){
            $manager->persist($etudiant);
            $manager->flush();
               return $this->redirectToRoute('affiche.etudiant');
        }else{
        return $this->render('etudiant/index.html.twig', [
            'form' => $form->createView(),
        ]);}
    }


    #[Route('/edit/{id}', name: 'edit.etudiant')]
    public function indexmodifier(Etudiant $etudiant=null,Request $req ,ManagerRegistry $doctrine): Response{
        if(!$etudiant){
            $etudiant= new Etudiant();
        }
        $manager = $doctrine->getManager();
        $form=$this->createForm(EtudiantType::class,$etudiant);
        $form->handleRequest($req);
        if ($form->isSubmitted()){
            $manager->persist($etudiant);
            $manager->flush();
            return $this->redirectToRoute('affiche.etudiant');
        }else{
            return $this->render('etudiant/index.html.twig', [
                'form' => $form->createView(),
            ]);}
    }

    #[Route('/delete/{id}', name: 'delete.etudiant')]
    public function indexsupprimer(Etudiant $etudiant=null ,ManagerRegistry $doctrine): RedirectResponse{
        if($etudiant){
            $manager = $doctrine->getManager();
            $manager->remove($etudiant);
            $manager->flush();
        }
        return $this->redirectToRoute('affiche.etudiant');
    }
}
