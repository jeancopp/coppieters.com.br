<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {

        foreach ($this->produceCompanies() as $company) {
            $manager->persist($company);
        }
        $manager->flush();
    }

    public function produceCompanies(): array {
        return [
            (new Company())
                ->setName('Alternativa Sistemas')
                ->setLocation('Bauru/SP')
                ->setDescription('Alternativa Sistemas is one of most important suppliers in marketplace of ERP for e-commerce, but the company has been existing before more than 20 years in activity.')
                ->setContact('www.alternativasistemas.com.br'),
            (new Company())
                ->setName('University of Sao Paulo State (UNESP)')
                ->setLocation('Bauru/SP')
                ->setDescription('University of Sao Paulo State(UNESP) is one of most important and classical public Brazilian University')
                ->setContact('www.unesp.br'),
            (new Company())
                ->setName('Innovae Brasil Software Engineer')
                ->setLocation('Bauru/SP')
                ->setDescription('Innovae Brasil Software Engineer is a company focused in solutions for Civil Engineer, providing ERP for that marketplace, and also have provided IT services for some customers.')
                ->setContact('www.innovae.com.br'),
            (new Company())
                ->setName('Finch Soluções')
                ->setLocation('Bauru/SP')
                ->setDescription('Finch Solutions is a company specializing in solutions for the Brazilian juridical marketplace, using artificial intelligence to predict legal outcomes and provide strategic guidance for lawyers. ')
                ->setContact('www.finchsolucoes.com.br'),
            (new Company())
                ->setName('LuxFacta Solutions')
                ->setLocation('Rio Claro/SP')
                ->setDescription('Luxfacta Solutions is a Brazilian Company which acting in an international marketplace with IT services.')
                ->setContact('www.luxfacta.com'),
            (new Company())
                ->setName('DB1 Global Software')
                ->setLocation('Maringá/PR')
                ->setDescription('DB1 Global Software is one of the largest companies in southern Brazil, with a wide range of IT services and products. I contributed to multiple projects, focusing on legacy systems and new solution development.')
                ->setContact('www.db1.com.br'),
            (new Company())
                ->setName('iCreate Consulting')
                ->setLocation('Lisbon/Portugal')
                ->setDescription('iCreate Consulting is a consulting firm providing services across Europe, and I was deployed to work with one of the largest Portuguese banks on their technology transition projects, being part of Inoweiser Group.')
                ->setContact('www.icreateconsulting.com'),
            (new Company())
                ->setName('People Health')
                ->setLocation('Ribeirão Preto')
                ->setDescription('This Brazilian startup was focused on developing a healthcare marketplace solution.')
                ->setContact('www.PeopleHealth.com.br'),
            (new Company())
                ->setName('Edge Consultant')
                ->setLocation('Lisbon/Portugal')
                ->setDescription('Edge Portugal is a leading consultancy firm that provides specialized services to clients across the country. I was assigned to work on an international project with TIMWeTech.')
                ->setContact('www.connectdigital.global'),
            (new Company())
                ->setName('OLX Portugal')
                ->setLocation('Lisbon/Portugal')
                ->setDescription('OLX Group offers various solutions for connecting buyers and sellers of different products. I was part of the Seller Success team, focusing on enhancing and maintaining vertical solutions for car sales.')
                ->setContact('www.olx.pt'),
            (new Company())
                ->setName('Coachy.net')
                ->setLocation('Germany')
                ->setDescription('Coachy is a platform from Germany that makes it easy for professionals to set up and manage their online courses. It ensures a smooth connection between educators and learners, with a strong focus on simplicity and ease of use.')
                ->setContact('www.coachy.net')

            ,
        ];
    }

}