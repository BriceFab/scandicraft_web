<?php

namespace App\Entity;

use App\Entity\Traits\UpdateCreateTrait;
use App\Repository\ImagesRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 * @UniqueEntity("image_key")
 * @Vich\Uploadable()
 */
class Images
{
    use UpdateCreateTrait;

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
     * @ORM\Column(type="string", length=255)
     */
    private $alt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $src;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image_key;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @Vich\UploadableField(mapping="upload_images", fileNameProperty="src")
     * @var File
     */
    private $file;

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

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
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

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getImageKey(): ?string
    {
        return $this->image_key;
    }

    public function setImageKey(?string $image_key): self
    {
        $this->image_key = $image_key;

        return $this;
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

    public function setFile(File $file = null)
    {
        $this->file = $file;

        if ($file) {
            $this->setUpdatedAt(new DateTime('now'));
        }
    }

    public function getFile()
    {
        return $this->file;
    }
}
