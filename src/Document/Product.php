<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Product
{
    #[MongoDB\Id]
    protected string $id;

    #[MongoDB\Field(type: 'string')]
    protected string $title;

    #[MongoDB\Field(type: 'string')]
    protected string $tag;

    #[MongoDB\ReferenceOne(targetDocument: Attributes::class, cascade: ["persist"], inversedBy: 'product')]
    protected ?Attributes $attributes;

    public function __construct()
    {
        $this->attributes = new Attributes();
    }

    public function getAttributes() : Attributes
    {
        return $this->attributes;
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