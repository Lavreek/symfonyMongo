<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
#[MongoDB\Index(['title' => 'text', 'tag' => 'text'], 'idx_title_tag', unique: true)]
class Product
{
    #[MongoDB\Id(type: 'string')]
    protected $id;

    #[MongoDB\Field(type: 'string')]
    protected $title;

    #[MongoDB\Field(type: 'string')]
    protected $tag;

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