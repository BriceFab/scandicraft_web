<?php

namespace App\Entity\Traits;

use App\Entity\Images;
use Doctrine\ORM\Mapping as ORM;

trait ThumbnailTrait
{

    /**
     * @ORM\ManyToOne(targetEntity=Images::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $thumbnail;

    public function getThumbnail(): ?Images
    {
        $thumbnail = $this->thumbnail;

        if (is_null($thumbnail) && method_exists(self::class, 'getImages')) {
            $images = $this->getImages();
            if ($images->count() > 0) {
                $thumbnail = $images->get(0);
            }
        }

        return $thumbnail;
    }

    public function setThumbnail(?Images $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

}
