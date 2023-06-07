<?php

namespace App\Controller\Api;

use App\Document\Product;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\MongoDBException;
use MongoDB\Driver\Exception\BulkWriteException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiProductController extends AbstractController
{
    #[Route('/api/product/create', name: 'app_api_product')]
    public function productCreate(Request $request, DocumentManager $manager): JsonResponse
    {
        if ($requestData = $request->request->all()) {
            if (!isset($requestData['title'], $requestData['tag'])) {
                return new JsonResponse(['status' => '400', 'message' => 'Body request is not valid.']);
            }

            $productRepo = $manager->getRepository(Product::class);

//            $product = $productRepo->findOneBy(['title' => $requestData['title'], 'tag' => $t])
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
}
