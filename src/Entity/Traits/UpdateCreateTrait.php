<?php

namespace App\Entity\Traits;

use Symfony\Component\Serializer\Annotation as Serializer;

trait UpdateCreateTrait
{
    use UpdateCreateByTrait;
    use UpdateCreateAtTrait;
}
