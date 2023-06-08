<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Attribute
{
    #[MongoDB\Id(type: 'string')]
    protected $id;

    #[MongoDB\ReferenceOne(targetDocument: Product::class, cascade: ["persist", "remove"], mappedBy: 'attribute')]
    protected $product;

    #[MongoDB\Field(type: 'string')]
    #[MongoDB\Index(['connection' => 'asc'], 'idx_connection', sparse: true)]
    protected $connection;

    public function getConnection() : string
    {
        return $this->connection;
    }

    public function setConnection($connection) : void
    {
        $this->connection = $connection;
    }
}