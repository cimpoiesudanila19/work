<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity
 */
class Blog
{
    /**
     * @var int
     *
     * @ORM\Column(name="BlogId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $blogid;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var int
     *
     * @ORM\Column(name="CategoryId", type="integer", nullable=false)
     */
    private $categoryid;

    public function getBlogid(): ?int
    {
        return $this->blogid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getCategoryid(): ?int
    {
        return $this->categoryid;
    }

    public function setCategoryid(int $categoryid): self
    {
        $this->categoryid = $categoryid;

        return $this;
    }


}
