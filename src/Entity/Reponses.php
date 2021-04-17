<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponsesRepository::class)
 */
class Reponses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rep;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="etud_reps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reps_etud;

    /**
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="lesreponses_dequestion")
     * @ORM\JoinColumn(nullable=false)
     */
    private $repondu_sur_question;

    /**
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="reponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question_de_reponses;





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRep(): ?string
    {
        return $this->rep;
    }

    public function setRep(string $rep): self
    {
        $this->rep = $rep;

        return $this;
    }



    public function getRepsEtud(): ?User
    {
        return $this->reps_etud;
    }

    public function setRepsEtud(?User $reps_etud): self
    {
        $this->reps_etud = $reps_etud;

        return $this;
    }

    public function getReponduSurQuestion(): ?Questions
    {
        return $this->repondu_sur_question;
    }

    public function setReponduSurQuestion(?Questions $repondu_sur_question): self
    {
        $this->repondu_sur_question = $repondu_sur_question;

        return $this;
    }

    public function getQuestionDeReponses(): ?Questions
    {
        return $this->question_de_reponses;
    }

    public function setQuestionDeReponses(?Questions $question_de_reponses): self
    {
        $this->question_de_reponses = $question_de_reponses;

        return $this;
    }



}
