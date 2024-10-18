<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $summary = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $contacts = null;

    #[ORM\Column(nullable: true)]
    private ?array $technologies = null;

    /**
     * @var Collection<int, Position>
     */
    #[ORM\OneToMany(
        targetEntity: Position::class,
        mappedBy: 'person',
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    private Collection $positions;

    /**
     * @var Collection<int, Education>
     */
    #[ORM\OneToMany(
        targetEntity: Education::class,
        mappedBy: 'person',
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    private Collection $educations;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
        $this->educations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSummary(): ?array
    {
        return $this->summary;
    }

    public function setSummary(?array $summary): static
    {
        $this->summary = $summary;

        return $this;
    }

    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    public function setContacts(?array $contacts): static
    {
        $this->contacts = $contacts;

        return $this;
    }

    public function getTechnologies(): ?array
    {
        return $this->technologies;
    }

    public function setTechnologies(?array $technologies): static
    {
        $this->technologies = $technologies;

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function setPositions(Collection $positions): Person
    {
        $this->positions = $positions;
        return $this;
    }

    public function addPosition(Position $position): static
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->setPerson($this);
        }

        return $this;
    }

    public function removePosition(Position $position): static
    {
        if ($this->positions->removeElement($position)) {
            // set the owning side to null (unless already changed)
            if ($position->getPerson() === $this) {
                $position->setPerson(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Education>
     */
    public function getEducations(): Collection
    {
        return $this->educations;
    }

    public function setEducations(Collection $educations): Person
    {
        $this->educations = $educations;
        return $this;
    }

    public function addEducation(Education $education): static
    {
        if (!$this->educations->contains($education)) {
            $this->educations->add($education);
            $education->setPerson($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): static
    {
        if ($this->educations->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getPerson() === $this) {
                $education->setPerson(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;
        return $this;
    }

}
