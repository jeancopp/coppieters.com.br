<?php

namespace App\Dto;

use App\Entity\Company;

class CompanyDto
{
    private ?int $id = null;
    private ?string $name = null;
    private ?string $location = null;
    private ?string $description = null;
    private ?string $contact = null;

    public static function produceBasedOn(?Company $company): CompanyDto
    {
        return (new self())
            ->setName($company?->getName())
            ->setDescription($company?->getDescription())
            ->setContact($company?->getContact())
            ->setLocation($company?->getLocation());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): CompanyDto
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): CompanyDto
    {
        $this->name = $name;
        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): CompanyDto
    {
        $this->location = $location;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): CompanyDto
    {
        $this->description = $description;
        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): CompanyDto
    {
        $this->contact = $contact;
        return $this;
    }


}