<?php

namespace App\Entity;

use App\Entity\Traits\ImagesTrait;
use App\Entity\Traits\SlugTrait;
use App\Entity\Traits\ThumbnailTrait;
use App\Entity\Traits\UpdateCreateByTrait;
use App\Entity\Traits\UpdateCreateTrait;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpoilRepository")
 * @Vich\Uploadable
 */
class Spoil
{
    use UpdateCreateTrait;
    use ThumbnailTrait;
    use ImagesTrait;
    use SlugTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $shareGoal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SpoilShare", mappedBy="spoil", orphanRemoval=true)
     */
    private $spoilShares;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SpoilGoalType", inversedBy="spoils")
     */
    private $goal_type;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $slug;

    public function __construct()
    {
        $this->initImages();
        $this->spoilShares = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getShareGoal(): ?int
    {
        return $this->shareGoal;
    }

    public function setShareGoal(?int $shareGoal): self
    {
        $this->shareGoal = $shareGoal;

        return $this;
    }

    /**
     * @return Collection|SpoilShare[]
     */
    public function getSpoilShares(): Collection
    {
        return $this->spoilShares;
    }

    public function addSpoilShare(SpoilShare $spoilShare): self
    {
        if (!$this->spoilShares->contains($spoilShare)) {
            $this->spoilShares[] = $spoilShare;
            $spoilShare->setSpoil($this);
        }

        return $this;
    }

    public function removeSpoilShare(SpoilShare $spoilShare): self
    {
        if ($this->spoilShares->contains($spoilShare)) {
            $this->spoilShares->removeElement($spoilShare);
            // set the owning side to null (unless already changed)
            if ($spoilShare->getSpoil() === $this) {
                $spoilShare->setSpoil(null);
            }
        }

        return $this;
    }

    public function getCurrentSocialShare()
    {
        return count($this->getSpoilShares());
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGoalType(): ?SpoilGoalType
    {
        return $this->goal_type;
    }

    public function setGoalType(?SpoilGoalType $goal_type): self
    {
        $this->goal_type = $goal_type;

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }

}
