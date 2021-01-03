<?php

namespace App\Entity;

use App\Entity\Traits\EnableTrait;
use App\Entity\Traits\UpdateCreateByTrait;
use App\Repository\StoreArticleRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StoreArticleRepository::class)
 */
class StoreArticle
{
    use UpdateCreateByTrait;
    use EnableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $untilDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="storeArticles")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne(targetEntity=StoreCategory::class, inversedBy="storeArticles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUntilDate(): ?DateTimeInterface
    {
        return $this->untilDate;
    }

    public function setUntilDate(?DateTimeInterface $untilDate): self
    {
        $this->untilDate = $untilDate;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getUserCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setUserCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getCategory(): ?StoreCategory
    {
        return $this->category;
    }

    public function setCategory(?StoreCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
