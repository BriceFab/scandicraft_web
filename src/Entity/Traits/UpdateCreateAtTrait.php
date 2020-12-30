<?php

namespace App\Entity\Traits;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;

trait UpdateCreateAtTrait
{

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Ignore()
     */
    protected $dateUpdatedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Serializer\Ignore()
     */
    protected $dateCreatedAt;

    public function getDateUpdatedAt(): ?DateTimeInterface
    {
        return $this->dateUpdatedAt;
    }

    public function setDateUpdatedAt(?DateTimeInterface $dateUpdatedAt): self
    {
        $this->dateUpdatedAt = $dateUpdatedAt;

        return $this;
    }

    public function getDateCreatedAt(): ?DateTimeInterface
    {
        return $this->dateCreatedAt;
    }

    public function setDateCreatedAt(?DateTimeInterface $dateCreatedAt): self
    {
        $this->dateCreatedAt = $dateCreatedAt;

        return $this;
    }

}
