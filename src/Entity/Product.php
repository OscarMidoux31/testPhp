<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['product_basic', 'product_extend'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product_extend'])]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product_basic', 'product_extend'])]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['product_extend'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['product_basic', 'product_extend'])]
    private ?int $price = null;

    #[ORM\Column]
    #[Groups(['product_extend'])]
    private ?int $quantity = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product_extend'])]
    private ?string $inventoryStatus = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product_extend'])]
    private ?string $category = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['product_basic', 'product_extend'])]
    private ?string $image = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['product_extend'])]
    private ?int $rating = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getInventoryStatus(): ?string
    {
        return $this->inventoryStatus;
    }

    public function setInventoryStatus(string $inventoryStatus): static
    {
        $this->inventoryStatus = $inventoryStatus;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }
}
