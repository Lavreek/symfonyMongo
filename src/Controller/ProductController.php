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
//        $attributes = new Attributes();
//        $attributes->setConnection("Hy-lok" . uniqid());

        $product = new Product();
        $product->setTitle(uniqid());
        $product->setTag(uniqid());
        $attributes = $product->getAttributes();
        $attributes->setConnection("HY-LOK2-".uniqid());

        $manager->persist($product);
        $manager->flush();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
