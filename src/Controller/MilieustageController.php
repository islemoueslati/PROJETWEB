<?php

namespace App\Controller;

use App\Entity\Bilan;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MilieustageController extends AbstractController
{
    /**
     * @Route("/milieustage", name="milieustage")
     */
    public function index(): Response
    {
        return $this->render('milieustage/index.html.twig');
    }
    /**
     * @Route("/affichermilieu", name="afficher_milieu")
     */
    public function show(): Response
    {
        $repository= $this->getDoctrine()->getRepository(Bilan::class);
        $bilans=$repository->findAll();

        return $this->render('milieustage/showquestions.html.twig',["bilans"=>$bilans]);
    }

}
