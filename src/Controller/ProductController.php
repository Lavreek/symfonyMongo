<?php

namespace App\Controller;

use App\Document\Attributes;
use App\Document\Product;
use App\Repository\ProductRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product')]
    public function index(DocumentManager $manager): Response
    {
        /** @var ProductRepository $productRepo */
        $productRepo = $manager->getRepository(Product::class);

        /** @var Product $products */
        $products = $productRepo->searchByTitle('Р');

        return $this->render('product/index.html.twig', [
            'products' => $products
        ]);
    }
}
