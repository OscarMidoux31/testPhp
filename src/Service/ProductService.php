<?php

namespace App\Service;

use App\Dto\ProductDto;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class ProductService
{
    public function __construct(private ProductRepository $productRepository)
    {}

    public function create(ProductDto $product): Product
    {

        return $this->productRepository->create($product);

    }

    public function update(ProductDto $productDto, Product $product): Product
    {
        return $this->productRepository->update($product, $productDto);
    }
}
