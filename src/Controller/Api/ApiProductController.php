<?php

namespace App\Controller\Api;

use App\Document\Product;
use App\Repository\ProductRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\MongoDBException;
use MongoDB\Driver\Exception\BulkWriteException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiProductController extends AbstractController
{
    #[Route('/api/product/create', name: 'api_product_create')]
    public function productCreate(Request $request, DocumentManager $manager): JsonResponse
    {
        if ($requestData = $request->request->all()) {
            if (!isset($requestData['title'], $requestData['tag'])) {
                return new JsonResponse(['status' => '400', 'message' => 'Body request is not valid.']);
            }

            $productRepo = $manager->getRepository(Product::class);

            $product = new Product();
            $product->setTitle($requestData['title']);
            $product->setTag($requestData['tag']);

            $manager->persist($product);

            try {
                $manager->flush();

            } catch (MongoDBException|BulkWriteException $exception) {
                return new JsonResponse(['status' => '400', 'message' => 'Product cannot be saved.', 'exception' => $exception->getMessage()]);
            }

            return new JsonResponse(['status' => '200', 'message' => 'Product has saved.']);
        } else {
            return new JsonResponse(['status' => '400', 'message' => 'Method not allowed.']);
        }
    }

    #[Route('/api/product/tag/find', name: 'api_product_tag_find')]
    public function productTagFind(Request $request, DocumentManager $manager): JsonResponse
    {
        if ($requestData = $request->request->all()) {
            if (!isset($requestData['tag'])) {
                return new JsonResponse(['status' => '400', 'message' => 'Request body is not valid.']);
            }

            return new JsonResponse(['status' => '200', 'message' => 'Method not allowed.']);
        } else {
            return new JsonResponse(['status' => '400', 'message' => 'Method not allowed.']);
        }
    }

    #[Route('/api/product/title/search', name: 'api_product_tag_search')]
    public function productTagSearch(Request $request, DocumentManager $manager): JsonResponse
    {
        if ($requestData = $request->request->all()) {
            if (!isset($requestData['title'])) {
                return new JsonResponse(['status' => 'failed', 'message' => 'Request body is not valid.']);
            }

            $title = $requestData['title'];

            /** @var ProductRepository $productRepo */
            $productRepo = $manager->getRepository(Product::class);

            $products = $productRepo->searchByTitle($title);

            $searchedTitles = [];

            foreach ($products as $product) {
                array_push(
                    $searchedTitles,
//                    str_replace($title, "<b>$title</b>", $product->getTitle())
                    $product->getTitle()
                );
            }

            return new JsonResponse(['status' => 'success', 'result' => $searchedTitles]);
        } else {
            return new JsonResponse(['status' => 'failed', 'message' => 'Method not allowed.']);
        }
    }
}
