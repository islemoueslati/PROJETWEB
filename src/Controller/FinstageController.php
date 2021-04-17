<?php

namespace App\Controller;

use App\Entity\Bilan;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FinstageController extends AbstractController
{
    /**
     * @Route("/finstage", name="finstage")
     */
    public function index(): Response
    {
        return $this->render('finstage/index.html.twig');
    }
    /**
     * @Route("/afficherfin", name="afficher_fin")
     */
    public function show(): Response
    {
        $repository= $this->getDoctrine()->getRepository(Bilan::class);
        $bilans=$repository->findAll();

        return $this->render('finstage/showquestions.html.twig',["bilans"=>$bilans]);
    }
}
