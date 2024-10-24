<?php

namespace App\Dto;

use App\Entity\Education;
use App\Entity\Position;

class CurriculumDto
{
    private string $name="";
    private array $summary=[];
    private array $contacts=[];
    private array $technologies=[];
    private array $positions=[];
    private array $education=[];

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CurriculumDto
    {
        $this->name = $name;
        return $this;
    }

    public function getSummary(): array
    {
        return $this->summary;
    }

    public function setSummary(array $summary): CurriculumDto
    {
        $this->summary = $summary;
        return $this;
    }

    public function getContacts(): array
    {
        return $this->contacts;
    }

    public function setContacts(array $contacts): CurriculumDto
    {
        $this->contacts = $contacts;
        return $this;
    }

    public function getTechnologies(): array
    {
        return $this->technologies;
    }

    public function setTechnologies(array $technologies): CurriculumDto
    {
        $this->technologies = $technologies;
        return $this;
    }

    public function getPositions(): array
    {
        return $this->positions;
    }

    public function setPositions(array $positions): CurriculumDto
    {
        $this->positions = $positions;
        return $this;
    }

    public function addPosition(Position $position): CurriculumDto
    {
        $this->positions[] = $position;
        return $this;
    }

    public function getEducation(): array
    {
        return $this->education;
    }

    public function setEducation(array $education): CurriculumDto
    {
        $this->education = $education;
        return $this;
    }

    public function addEducation(Education $education): CurriculumDto
    {
        $this->education[] = $education;
        return $this;
    }




}