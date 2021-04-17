<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionsRepository::class)
 */
class Questions
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
    private $quest;

    /**
     * @ORM\Column(type="integer")
     */
    private $IndexPeriode;

    /**
     * @ORM\ManyToMany(targetEntity=Bilan::class, mappedBy="questions_bilan")
     */
    private $questions_bilans;

    /**
     * @ORM\OneToMany(targetEntity=Reponses::class, mappedBy="Reponses_de_question")
     */
    private $question_reponses;




    public function __construct()
    {
        $this->questions_bilans = new ArrayCollection();
        $this->reps_question = new ArrayCollection();
        $this->question_reponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuest(): ?string
    {
        return $this->quest;
    }

    public function setQuest(string $quest): self
    {
        $this->quest = $quest;

        return $this;
    }

    public function getIndexPeriode(): ?int
    {
        return $this->IndexPeriode;
    }

    public function setIndexPeriode(int $IndexPeriode): self
    {
        $this->IndexPeriode = $IndexPeriode;

        return $this;
    }

    /**
     * @return Collection|Bilan[]
     */
    public function getQuestionsBilans(): Collection
    {
        return $this->questions_bilans;
    }

    public function addQuestionsBilan(Bilan $questionsBilan): self
    {
        if (!$this->questions_bilans->contains($questionsBilan)) {
            $this->questions_bilans[] = $questionsBilan;
            $questionsBilan->addQuestionsBilan($this);
        }

        return $this;
    }

    public function removeQuestionsBilan(Bilan $questionsBilan): self
    {
        if ($this->questions_bilans->removeElement($questionsBilan)) {
            $questionsBilan->removeQuestionsBilan($this);
        }

        return $this;
    }

    /**
     * @return Collection|Reponses[]
     */
    public function getQuestionReponses(): Collection
    {
        return $this->question_reponses;
    }

    public function addQuestionReponse(Reponses $questionReponse): self
    {
        if (!$this->question_reponses->contains($questionReponse)) {
            $this->question_reponses[] = $questionReponse;
            $questionReponse->setReponsesDeQuestion($this);
        }

        return $this;
    }

    public function removeQuestionReponse(Reponses $questionReponse): self
    {
        if ($this->question_reponses->removeElement($questionReponse)) {
            // set the owning side to null (unless already changed)
            if ($questionReponse->getReponsesDeQuestion() === $this) {
                $questionReponse->setReponsesDeQuestion(null);
            }
        }

        return $this;
    }




}
