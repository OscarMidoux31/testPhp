<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class ProductDto
{
    public function __construct(
        #[Assert\Type('string')]
        public readonly string $code,
        #[Assert\Type('string')]
        public readonly string $name,
        #[Assert\Type('string')]
        public readonly string $description,
        public readonly int $price,
        public readonly int $quantity,
        #[Assert\Type('string')]
        public readonly string $inventoryStatus,
        #[Assert\Type('string')]
        public readonly string $category,
        public ?string $image,
        public ?int $rating
    )
    {
    }
}
