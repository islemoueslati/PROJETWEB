<?php

namespace App\Controller;

use App\Entity\Bilan;
use App\Entity\Questions;
use App\Entity\Reponses;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function show(): Response
    {
        $repository= $this->getDoctrine()->getRepository(Reponses::class);
        $repository1=$this->getDoctrine()->getRepository(Questions::class);
        $questions=$repository1->findAll();
        $reponses=$repository->findAll();


        return $this->render('test/index.html.twig',["reponses"=>$reponses,"questions"=>$questions]);
    }
}
