<?php

namespace App\Controller;

use App\Document\Attributes;
use App\Document\Product;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/', name: 'app_product')]
    public function index(DocumentManager $manager): Response
    {

        $productRepo = $manager->getRepository(Product::class);

        /** @var Product $product */
//        $product = $productRepo->findOneBy([]);
//        dd($product->getAttribute());

//        $product = new Product();
//        $product->setTitle(uniqid());
//        $product->setTag(uniqid());
//        $attribute = $product->getAttribute();
//        $attribute->setConnection("HY-LOK-".uniqid());
//
//        $manager->persist($product);
//        $manager->flush();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
