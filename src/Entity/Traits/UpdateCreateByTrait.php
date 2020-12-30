<?php

namespace App\Entity\Traits;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation as Serializer;

trait UpdateCreateByTrait
{

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @Serializer\Ignore()
     */
    protected $userCreatedBy;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @Serializer\Ignore()
     */
    protected $userUpdatedBy;

    public function getUserCreatedBy(): ?User
    {
        return $this->userCreatedBy;
    }

    public function setUserCreatedBy(?User $userCreatedBy): self
    {
        $this->userCreatedBy = $userCreatedBy;

        return $this;
    }

    public function getUserUpdatedBy(): ?User
    {
        return $this->userUpdatedBy;
    }

    public function setUserUpdatedBy(?User $userUpdatedBy): self
    {
        $this->userUpdatedBy = $userUpdatedBy;

        return $this;
    }

}
