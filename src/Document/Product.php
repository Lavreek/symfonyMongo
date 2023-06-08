<?php

namespace App\Document;

use App\Repository\ProductRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(repositoryClass: ProductRepository::class)]
#[MongoDB\Index(['title' => 'asc', 'tag' => 'asc'], 'idx_title_tag', unique: true, options: ['default_language' => 'russian'])]
class Product
{
    #[MongoDB\Id]
    protected string $id;

    #[MongoDB\Field(type: 'string', nullable: false)]
    #[MongoDB\Index(['title' => 'text'], 'idx_title')]
    protected string $title;

    #[MongoDB\Field(type: 'string', nullable: false)]
    #[MongoDB\Index(['tag' => 'asc'], 'idx_tag')]
    protected string $tag;

    #[MongoDB\ReferenceOne(targetDocument: Attribute::class, cascade: ["persist", "remove"], inversedBy: 'product')]
    protected ?Attribute $attribute;

    public function __construct()
    {
        $this->attribute = new Attribute();
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function getAttribute() : Attribute
    {
        return $this->attribute;
    }

    public function setTitle($title) : void
    {
        $this->title = $title;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTag($tag) : void
    {
        $this->tag = $tag;
    }

    public function getTag() : string
    {
        return $this->tag;
    }
}