<?php

namespace App\Entity;

use App\Entity\Traits\ImagesTrait;
use App\Entity\Traits\SlugTrait;
use App\Entity\Traits\ThumbnailTrait;
use App\Entity\Traits\UpdateCreateTrait;
use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 */
class News
{
    use UpdateCreateTrait;
    use ThumbnailTrait;
    use ImagesTrait;
    use SlugTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $slug;

    public function __construct()
    {
        $this->initImages();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

}
