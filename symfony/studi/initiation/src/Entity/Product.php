<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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

    /**
     * @ORM\ManyToMany(targetEntity=Field::class, inversedBy="products")
     */
    private $field;

    /**
     * @ORM\ManyToMany(targetEntity=Language::class, mappedBy="relation")
     */
    private $languages;

    public function __construct()
    {
        $this->field = new ArrayCollection();
        $this->languages = new ArrayCollection();
    }

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

    /**
     * @return Collection|Field[]
     */
    public function getField(): Collection
    {
        return $this->field;
    }

    public function addField(Field $field): self
    {
        if (!$this->field->contains($field)) {
            $this->field[] = $field;
        }

        return $this;
    }

    public function removeField(Field $field): self
    {
        $this->field->removeElement($field);

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
            $language->addRelation($this);
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        if ($this->languages->removeElement($language)) {
            $language->removeRelation($this);
        }

        return $this;
    }
}
