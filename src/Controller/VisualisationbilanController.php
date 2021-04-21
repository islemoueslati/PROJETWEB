<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisualisationbilanController extends AbstractController
{
    /**
     * @Route("/visualisationbilan", name="visualisation_bilan")
     */
    public function index(): Response
    {
        return $this->render('visualisationbilan/index.html.twig');
    }
}
