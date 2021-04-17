<?php

namespace App\Controller;

use App\Entity\Bilan;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DebutstageController extends AbstractController
{
    /**
     * @Route("/debutstage", name="debutstage")
     */
    public function index(): Response
    {
        return $this->render('debutstage/index.html.twig');
    }

    /**
     * @Route("/afficherdebut", name="afficher_debut")
     */
    public function show(): Response
    {
        $repository= $this->getDoctrine()->getRepository(Bilan::class);
        $bilans=$repository->findAll();

        return $this->render('debutstage/showquestions.html.twig',["bilans"=>$bilans]);
    }
}
