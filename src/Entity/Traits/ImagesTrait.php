<?php

namespace App\Entity\Traits;

use App\Entity\Images;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

trait ImagesTrait
{

    /**
     * @ORM\ManyToMany(targetEntity=Images::class, cascade={"persist"})
     */
    private $images;

    public function initImages()
    {
        $this->images = new ArrayCollection();
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        $this->images->removeElement($image);

        return $this;
    }

}
