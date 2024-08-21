<?php

namespace App\Repository;

use App\Dto\ProductDto;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $entityManager,)
    {
        parent::__construct($registry, Product::class);
    }

    public function remove(Product $product){
        $this->entityManager->remove($product);
        $this->entityManager->flush();
    }

    public function save(Product $product){
        $this->entityManager->persist($product);
        $this->entityManager->flush();
        return $product;
    }

    public function create(ProductDto $productDto): Product{
        $product = new Product();
        $product->setCode($productDto->code);
        $product->setName($productDto->name);
        $product->setDescription($productDto->description);
        $product->setPrice($productDto->price);
        $product->setQuantity($productDto->quantity);
        $product->setInventoryStatus($productDto->inventoryStatus);
        $product->setCategory($productDto->category);

        if(!empty($productDto->image)){
            $product->setImage($productDto->image);
        }
        if(!empty($productDto->rating)){
            $product->setRating($productDto->rating);
        }

        $this->save($product);

        return $product;
    }

    public function update(Product $product, ProductDto $productDto){

        if(!empty($productDto->code)){
            $product->setCode($productDto->code);
        }
        if(!empty($productDto->name)){
            $product->setName($productDto->name);
        }
        if(!empty($productDto->description)){
            $product->setDescription($productDto->description);
        }
        if(!empty($productDto->price)){
            $product->setPrice($productDto->price);
        }
        if(!empty($productDto->quantity)){
            $product->setQuantity($productDto->quantity);
        }
        if(!empty($productDto->inventoryStatus)){
            $product->setInventoryStatus($productDto->inventoryStatus);
        }
        if(!empty($productDto->category)){
            $product->setCategory($productDto->category);
        }
        if(!empty($productDto->image)){
            $product->setImage($productDto->image);
        }
        if(!empty($productDto->rating)){
            $product->setRating($productDto->rating);
        }
        $this->save($product);

        return $product;
    }
}
