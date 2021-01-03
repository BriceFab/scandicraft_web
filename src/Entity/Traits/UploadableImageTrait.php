<?php

namespace App\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class UploadableImage
 * @package App\Entity\Traits
 * @Vich\Uploadable()
 */
trait UploadableImageTrait
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="upload_images", fileNameProperty="image")
     * @var File
     */
    protected $imageFile;

    public function setImageFile(File $file = null)
    {
        $this->imageFile = $file;

        if ($file && method_exists(self::class, 'setUpdatedAt')) {
            $this->setUpdatedAt(new DateTime('now'));
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;

    }

    public function getImage(): ?string
    {
        return $this->image;
    }

}
