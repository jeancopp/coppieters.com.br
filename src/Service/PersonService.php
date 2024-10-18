<?php

namespace App\Service;

use App\Dto\CurriculumDto;
use App\Entity\Education;
use App\Entity\Person;
use App\Repository\PersonRepository;

readonly class PersonService
{

    public function __construct(
        private PersonRepository $personRepository
    ){}

    public function getDataOf(?string $user): ?CurriculumDto
    {
        /** @var ?Person $person */
        $person = $this->personRepository->findOneBy([
            'slug' => $user
        ]);

        $educations = $person?->getEducations()?->map(function (Education $education) {
            return [
                'description' => $education->getDescription(),
                'institution' => $education->getInstitution(),
                'title' => $education->getTitle(),
                'year' => $education->getYear(),
            ];
        })?->toArray() ?? [];


        return (new CurriculumDto())
            ->setName($person?->getName())
            ->setContacts($person?->getContacts())
            ->setTechnologies($person?->getTechnologies())
            ->setSummary($person?->getSummary())
            ->setEducation($educations);
    }


}