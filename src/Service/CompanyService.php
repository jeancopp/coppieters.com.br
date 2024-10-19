<?php

namespace App\Service;

use App\Dto\CompanyDto;
use App\Repository\CompanyRepository;

class CompanyService
{


    public function __construct(
        private readonly CompanyRepository $companyRepository,
    ){}

    /**
     * @return CompanyDto[]
     */
    public function list(): array
    {
        return $this->companyRepository->findAll();
    }

    /**
     * @param string $name
     * @return CompanyDto
     */
    public function get(string $name): CompanyDto
    {
        return CompanyDto::produceBasedOn($this->companyRepository->findOneBy([
            'name' => $name,
        ]));
    }

}