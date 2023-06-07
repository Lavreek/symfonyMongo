<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Attributes
{
    #[MongoDB\Id]
    protected string $id;

    #[MongoDB\ReferenceOne(targetDocument: Product::class, cascade: ["persist"], mappedBy: 'attribute')]
    protected $product;

    #[MongoDB\Field(type: 'string')]
    protected string $connection;

    public function getConnection() : string
    {
        return $this->connection;
    }

    public function setConnection($connection) : void
    {
        $this->connection = $connection;
    }
}