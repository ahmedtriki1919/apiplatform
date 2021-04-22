<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PetRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(iri="categories")
 * @ORM\Entity(repositoryClass=PetRepository::class)
 */
class Pet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("pet:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pet:read", "pet:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("pet:read")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("pet:read")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("pet:read")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="pets")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"pet:read", "pet:write"})
     */
    private $categories;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }



    public function getCategories(): ?Category
    {
        return $this->categories;
    }

    public function setCategories(?Category $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}
