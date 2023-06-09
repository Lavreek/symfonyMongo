<?php

namespace App\Repository;

use App\Document\Product;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Doctrine\ODM\MongoDB\UnitOfWork;
use MongoDB\BSON\Javascript;
use MongoDB\BSON\Regex;

class ProductRepository extends DocumentRepository
{
    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $classMetadata)
    {
        parent::__construct($dm, $uow, $classMetadata);
    }

    /**
     * @throws MongoDBException
     */
    public function findByTag($tag)
    {
        $builder = $this->dm->createQueryBuilder(Product::class);

        $find = $builder
            ->select('id', 'title', 'tag')
            ->field('tag')->equals($tag)
            ->getQuery()
            ->execute()
        ;

        return $find;
    }

    public function createPregQuery($title) : string
    {
        $preg = new PregChars();
        return $preg->createPregTitle($title);
    }

    /**
     * @throws MongoDBException
     */
    public function searchByTitle($title)
    {
        $builder = $this->dm->createQueryBuilder(Product::class);

        $match = [new Regex('.*' . $this->createPregQuery($title) . '.*')];

        $find = $builder
            ->select('id', 'title', 'tag')
            ->field('title')->in($match)
            ->limit(5)
            ->getQuery()
            ->execute();

        return $find;
    }
}
