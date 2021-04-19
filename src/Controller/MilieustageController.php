<?php

namespace App\Controller;

use App\Entity\Bilan;
use App\Entity\Reponses;
use App\Repository\QuestionsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/bilanmilieu", name="bilan_milieu", methods={"GET","POST"})
     */
    public function new(Request $request,
                        QuestionsRepository $questionsRepository,
                        EntityManagerInterface $em
    ) : Response {
        if ($request->isMethod('POST')) {
            foreach($request->request as $idQuestion=>$responseUser){
                $question = $questionsRepository->findOneBy(["id"=>$idQuestion]);
                $response = new Reponses();
                $response->setRep($responseUser);
                $response->setQuestionDesReponses($question);
                $em->persist($response);
            }
            $em->flush();
        }
        return $this->render('milieustage/answerquestions.html.twig', [
            'questions' => $questionsRepository->findAll()
        ]);
    }
}
