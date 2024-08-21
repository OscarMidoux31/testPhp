<?php

namespace App\Controller;

use App\Dto\ProductDto;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ProductsController extends AbstractController
{
    public const ROUTE_NAME = '/products/{id}';
    public function __construct(
        private NormalizerInterface $normalizer,
        private ProductRepository $productRepository,
        private ProductService $productService
        )
    {}

    #[Route('/products', name: 'app_create_products', methods: 'POST')]
    public function create(#[MapRequestPayload] ProductDto $productDto): Response
    {
        return new JsonResponse(
            $this->normalizer->normalize(
                $this->productService->create($productDto),
                null,
                ['groups' => 'product_basic']
            )
        );
    }
    #[Route('/products', name: 'app_get_all_products', methods: 'GET')]
    public function getAll(): Response
    {
        $products = $this->productRepository->findAll();
        $result['data'] = $products;
        $result['length'] = count($products);
        return new JsonResponse(
            $this->normalizer->normalize(
                $result,
                null,
                ['groups' => 'product_extend']
            )
        );
    }
    #[Route( self::ROUTE_NAME, name: 'app_get_one_products', methods: 'GET')]
    public function getOne(Product $product): Response
    {
        
        return new JsonResponse(
                $this->normalizer->normalize(
                    $product,
                    null,
                    ['groups' => 'product_extend']
                )
        );
    }
    #[Route( self::ROUTE_NAME, name: 'app_update_products', methods: 'PATCH')]
    public function update(#[MapRequestPayload] ProductDto $productDto, Product $product): Response
    {
        return new JsonResponse(
            $this->normalizer->normalize(
                $this->productService->update($productDto, $product),
                null,
                ['groups' => 'product_extend']
            )
        );
    }
    #[Route( self::ROUTE_NAME, name: 'app_delete_products', methods: 'DELETE')]
    public function delete(Product $product): Response
    {
        $this->productRepository->remove($product);
        return new JsonResponse(
        'sucess'
        );
    }
}
