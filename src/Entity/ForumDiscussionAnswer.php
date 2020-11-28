<?php

namespace App\Entity;

use App\Entity\Traits\UpdateCreateTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ForumDiscussionAnswerRepository")
 */
class ForumDiscussionAnswer
{
    use UpdateCreateTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="forumDiscussionAnswers")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ForumDiscussion", inversedBy="forumDiscussionAnswers")
     */
    private $discussion;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 30,
     *      allowEmptyString = false,
     * )
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getDiscussion(): ?ForumDiscussion
    {
        return $this->discussion;
    }

    public function setDiscussion(?ForumDiscussion $discussion): self
    {
        $this->discussion = $discussion;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function __toString()
    {
        return 'reponse#' . $this->getId() . '-' . $this->getCreatedBy()->getUsername();
    }
}
