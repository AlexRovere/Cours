<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $traduction;

    /**
     * @ORM\ManyToMany(targetEntity=field::class, inversedBy="languages")
     */
    private $field;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="languages")
     */
    private $relation;

    public function __construct()
    {
        $this->field = new ArrayCollection();
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getTraduction(): ?string
    {
        return $this->traduction;
    }

    public function setTraduction(?string $traduction): self
    {
        $this->traduction = $traduction;

        return $this;
    }

    /**
     * @return Collection|field[]
     */
    public function getField(): Collection
    {
        return $this->field;
    }

    public function addField(field $field): self
    {
        if (!$this->field->contains($field)) {
            $this->field[] = $field;
        }

        return $this;
    }

    public function removeField(field $field): self
    {
        $this->field->removeElement($field);

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Product $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
        }

        return $this;
    }

    public function removeRelation(Product $relation): self
    {
        $this->relation->removeElement($relation);

        return $this;
    }
}
