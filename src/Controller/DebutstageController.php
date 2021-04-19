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
    /**
     * @Route("/bilandebut", name="bilan_debut", methods={"GET","POST"})
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
        return $this->render('debutstage/answerquestions.html.twig', [
            'questions' => $questionsRepository->findAll()
        ]);
    }

}
