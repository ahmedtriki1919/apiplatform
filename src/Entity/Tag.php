<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    // /**
    //  * @ORM\ManyToMany(targetEntity=Pet::class, mappedBy="tags")
    //  */
    // private $pets;

    // public function __construct()
    // {
    //     $this->pets = new ArrayCollection();
    // }

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

    // /**
    //  * @return Collection|Pet[]
    //  */
    // public function getPets(): Collection
    // {
    //     return $this->pets;
    // }

    // public function addPet(Pet $pet): self
    // {
    //     if (!$this->pets->contains($pet)) {
    //         $this->pets[] = $pet;
    //         $pet->addTag($this);
    //     }

    //     return $this;
    // }

    // public function removePet(Pet $pet): self
    // {
    //     if ($this->pets->removeElement($pet)) {
    //         $pet->removeTag($this);
    //     }

    //     return $this;
    // }
}
