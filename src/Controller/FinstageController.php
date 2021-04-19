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
    /**
     * @Route("/bilanfin", name="bilan_fin", methods={"GET","POST"})
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
        return $this->render('finstage/answerquestions.html.twig', [
            'questions' => $questionsRepository->findAll()
        ]);
    }
}
