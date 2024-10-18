<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Education;
use App\Entity\Person;
use App\Entity\Position;
use App\Repository\CompanyRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class JeanCvFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $person = new Person();
        $person
            ->setName("Jean Coppieters Souza")
            ->setSlug("jean-coppieters-souza")
            ->setContacts([
                "LinkedIn" => "https://www.linkedin.com/in/jeancoppieters/",
                "E-mail" => "jean.coppieters@hotmail.com",
                "Cellphone" => "+351 912 215 079",
            ])
            ->setSummary([
                "Software Engineer with over 15 years of experience through architecture, design, and development.",
                "Expertise in designing scalable and distributed enterprise applications using technologies such as Netflix OSS.",
                "Proven ability to lead project teams with a focus on agile methodologies, such as Scrum, to deliver efficient solutions.",
                "Experienced Software Architect, developing solutions to improve system performance and scalability.",
                "Skilled in managing and driving teams on complex projects",
                "Brazilian living in Portugal, with a valid work permit in the European Union.",
            ])
            ->setTechnologies($this->produceTechnologies())
            ->setEducations(new ArrayCollection(
                $this->produceEducation($person)
            ))
            ->setPositions(new ArrayCollection(
                $this->producePositions($person, $manager->getRepository(Company::class))
            ));

        $manager->persist($person);
        $manager->flush();
    }


    public function produceEducation(Person $person): array
    {
        return [
            (new Education())
                ->setTitle("Specialization in Software Engineering")
                ->setInstitution("University of Sacred Heart")
                ->setYear("2016")
                ->setPerson($person)
                ->setDescription("Post-graduation realized in one of most traditional University of Sao Paulo south-west. The course provided a deeply vision of all aspects about the process of Software Engineering. At the end of the course was wrote an article about how to combine microservice architecture with image processing."),
            (new Education())
                ->setTitle("Bachelor of Systems Information Degree")
                ->setInstitution("Sciences School, University of São Paulo State")
                ->setYear("2012")
                ->setPerson($person)
                ->setDescription("University of Sao Paulo State is one of most traditional and important Brazilian University. For my entire degree I could learn with professor of lots areas, like software engineer, robotic, simulation, etc. At the end of the course, I developed a software about e-learning process with some gamification skills, inspired in roleplaying games."),
            (new Education())
                ->setTitle("Computer Technician")
                ->setInstitution("CEETESP")
                ->setYear("2007")
                ->setPerson($person)
                ->setDescription("CEETESP is a traditional school in Sao Paulo State in Brazil, which has lots of technician course. For the end of the course, I developed using an application for a customer, where I could participated of all process of development, receiving teacher orientation."),
        ];
    }

    /**
     * @return string[]
     */
    public function produceTechnologies(): array
    {
        return [
            "Operating systems" => "MS-Windows, Linux",
            "Programming Languages" => "Java, JavaScript, C#, VB.Net, Delphi, PHP, Golang",
            "Internet / Web" => "J2EE containers (Tomcat, Undertow, JBoss, Apache)",
            "Tools" => "IntelliJ, VSCode, Eclipse",
            "Distributed Systems" => "REST, SOAP, EJB, JMS",
            "Libraries/Frameworks" => "Spring Framework, Angular, AngularJS, VueJS (2, 3), React, ASP.NET MVC, Tess4J OCR, JPA/Hibernate, Doctrine, JUnit, PHPUnit, Mockito, Hamcrest",
            "Databases" => "Oracle, MS SQL Server, MySQL, Firebird, PostgreSQL",
            "NoSQL" => "MongoDB",
            "Cloud" => "AWS EC2, Docker, Kubernetes",
        ];
    }

    private function producePositions(Person $person, CompanyRepository $repository): array
    {
        $producer = static fn(string $companyName, string $startAt, string $endAt) => (new Position())
            ->setPerson($person)
            ->setStartAt(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "$startAt 00:00:00"))
            ->setEndAt(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "$endAt 00:00:00"))
            ->setCompany($repository->findOneBy(['name' => $companyName]));
        return [
            $producer("Coachy.net", "2022-04-01", "2024-07-01")
                ->setTitle("Head of Development")
                ->setDescription("As the Head of Development, I managed three key areas:
• People Management:
  - Conducted 1-on-1 meetings for career development.
  - Set and tracked individual goals throughout the year.
  - Designed personalized development paths tailored to individual needs.

• Project Management:
  - Planned and executed projects using the Scrum framework.
  - Managed sprints with multiple objectives simultaneously.
  - Facilitated Scrum ceremonies: daily stand-ups, sprint planning, and retrospectives.

• Full Stack Development:
  - Led the creation, evolution, and maintenance of components using Vue.js and Symfony.
  - Enhanced front-end skills to complement a strong back-end background.
  - Integrated modern technologies to deliver robust and scalable applications")
                ->setStack([
                    "Symfony Framework", "PHP 8.2", "VueJS 3",
                    "Node.js", "Twig render", "SASS", "HTML5",
                    "PostgresSQL", "Laravel/Lumen Framework", "Eloquent ORM",
                    "React.JS"
                ]),
            $producer("Coachy.net", "2021-09-01", "2022-04-01")
                ->setTitle("Software Engineer")
                ->setDescription("• Platform Development:
  - Developed the new version of the platform using PHP and Symfony.
  - Utilized PostgreSQL for database management.

• System Migration:
  - Analyzed the previous platform version.
  - Led the migration to the new release, ensuring best practices were followed.

• User Experience Focus:
  - Prioritized simplicity and ease of use for end users.
  - Ensured the platform remained user-friendly throughout updates.")
                ->setStack([
                    "Symfony Framework", "PHP 8.X", "Node.js",
                    "Twig render", "SASS", "HTML5", "PostgreSQL"
                ]),
            $producer("OLX Portugal", "2020-12-01", "2021-06-01")
                ->setTitle("Software Development Engineer")
                ->setDescription("As a member of the Seller Success team, I focused on enhancing vertical solutions for car sales:
• Product Development:
  - Improved solutions related to posting and managing car sale adverts.
  - Collaborated with the team to optimize the user experience for sellers.

• Team Collaboration:
  - Worked closely with cross-functional teams to deliver high-quality software solutions.
  - Contributed to the continuous improvement of processes and best practices.")
                ->setStack([
                    "PHP 7.4", "Golang", "MySQL", "AWS", "Docker", "Kubernetes", "Redis"
                ]),

            $producer("Edge Consultant", "2020-06-01", "2020-12-01")
                ->setTitle("Senior Software Engineering Consultant")
                ->setDescription("Consulted on a project with TIMWeTech, focusing on microservices architecture:
• Microservices Development:
  - Developed and maintained microservices handling a high volume of requests.
  - Created services to connect and share telemetric and metric data using asynchronous protocols.
  
• International Collaboration:
  - Worked with international teams to ensure scalability and reliability across clients.")
                ->setStack([
                    "Java 8", "Jersey RESTful", "Apache Tomcat", "Docker", "Kubernetes",
                    "RabbitMQ", "Redis", "Oracle 12c", "Kong Gateway"
                ]),

            $producer("iCreate Consulting", "2019-11-01", "2020-05-01")
                ->setTitle("Fullstack Developer")
                ->setDescription("Contributed to technology transition projects for one of the largest Portuguese banks:
• Technology Transition and Testing:
  - Assisted in migrating the bank’s solutions to new technologies.
  - Developed testing patterns to ensure the reliability of transitioned solutions.

• Quality Assurance:
  - Implemented best practices in software testing.
  - Collaborated with development teams to refine quality standards.")
                ->setStack([
                    "Java 6", "Java 8", "EJB", "IBM Websphere", "Spring Framework",
                    "JUnit", "Mockito", "Cucumber", "NodeJS", "VueJS", "PostgreSQL", "Oracle 12g"
                ]),
            $producer("People Health", "2019-02-01", "2019-07-01")
                ->setTitle("Fullstack Developer")
                ->setDescription("As a Full Stack Engineer in a healthcare startup, I developed a platform for appointment scheduling:
• Platform Development:
  - Designed and implemented features for scheduling appointments and retrieving provider information.
  - Ensured the platform was secure, scalable, and user-friendly.

• Cross-functional Collaboration:
  - Worked with product and design teams to align technical solutions with business needs.
  - Delivered a highly responsive and intuitive platform.")
                ->setStack([
                    "Java 8", "Spring Boot", "VRaptor Framework", "JPA", "Apache Tomcat",
                    "Angular 7", "PostgreSQL"
                ]),

            $producer("DB1 Global Software", "2017-02-01", "2019-01-01")
                ->setTitle("Software Engineer")
                ->setDescription("At DB1 Global Software, I contributed to multiple projects, focusing on legacy systems and new solutions:
• Legacy System Maintenance:
  - Improved and maintained existing software for stability and performance.

• Software Architecture:
  - Designed new architectures for migration projects and led development efforts to meet deadlines.")
                ->setStack([
                    "Java", "EJB", "Spring MVC", "Spring Data", "JAX-RS", "JAX-B",
                    "JBoss Server", "Apache Tomcat", "AngularJS", "VueJS", "Node.js"
                ]),

            $producer("LuxFacta Solutions", "2016-10-01", "2017-01-01")
                ->setTitle("Senior Java/Fullstack Developer")
                ->setDescription("As a Fullstack Developer, I developed a management information solution for multiple platforms:
• Feature Development:
  - Developed features using Spring MVC to create endpoints consumed by Front End and mobile apps.
  - Delivered features weekly using Scrum methodology, allowing for client feedback at each step.")
                ->setStack([
                    "Java 8", "Spring MVC", "Apache Maven", "Apache Tomcat",
                    "JPA", "JQuery", "Bootstrap", "Apache POI"
                ]),

            $producer("Finch Soluções", "2016-01-01", "2016-10-01")
                ->setTitle("Software Development Team Leader")
                ->setDescription("Led a team developing legal tech solutions, focusing on artificial intelligence integration:
• Team Leadership:
  - Managed a development team on multiple projects, ensuring timely delivery.
  - Coordinated architectural decisions to meet business requirements.

• AI Integration:
  - Integrated machine learning algorithms for legal sentence predictions to assist lawyers in decision-making.")
                ->setStack([
                    "Java 8", "Python", "MongoDB", "MySQL", "SQL Server",
                    "Spring Framework", "Netflix OSS", "Docker", "JUnit", "Node.js"
                ]),
            $producer("Finch Soluções", "2015-05-01", "2015-12-01")
                ->setTitle("Software Developer")
                ->setDescription("As a Software Developer at Finch Solutions, I focused on enhancing legal tech solutions:
• Legal Tech Development:
  - Contributed to the evolution of legal marketplace solutions using production line concepts.
  - Developed and enhanced functionalities to streamline legal processes.

• Collaborative Projects:
  - Worked with cross-functional teams to integrate feedback and improve software designs.")
                ->setStack([
                    "VB6", ".NET", ".NET(2.5, 3.0, 4.5)", "VB.net", "C#", "SQL Server 2008"
                ]),

            $producer("Finch Soluções", "2014-07-01", "2015-05-01")
                ->setTitle("Junior Java Developer – Researcher")
                ->setDescription("As a Junior Java Developer, I focused on research and development of data capture technologies:
• Research and Development:
  - Developed solutions for data capture and extraction to support legal analysis tools.
  - Integrated data processing into other applications to enhance functionality.

• Innovation and Automation:
  - Leveraged Java Advanced Imaging (JAI) and Tess4j OCR for automated document processing.")
                ->setStack([
                    "Java 7", "JDBC", "MySQL", "Apache Nutch", "HtmlUnit",
                    "XPath", "XQuery", "Apache Hadoop", "Tess4j OCR", "Java Advanced Imaging (JAI)"
                ]),

            $producer("Innovae Brasil Software Engineer", "2014-05-01", "2014-06-01")
                ->setTitle("Software Developer")
                ->setDescription("As a Software Developer, I worked on a migration project for academic software:
• Migration Project:
  - Worked closely with senior engineers and the product owner to migrate an academic solution.
  - Ensured daily alignments following Scrum-inspired practices, delivering the solution on time.")
                ->setStack([
                    "Delphi 2010", "SQL Server 2008"
                ]),

            $producer("Alternativa Sistemas", "2012-12-01", "2014-01-01")
                ->setTitle("Junior Software Developer")
                ->setDescription("Developed ERP systems for e-commerce integrations at Alternativa Sistemas:
• ERP System Development:
  - Developed and enhanced functionalities to integrate ERP systems with e-commerce platforms.
  - Focused on improving software reliability for smooth operational flow.

• Technical Proficiencies:
  - Employed Delphi and .NET technologies for software development.
  - Utilized SOAP for web service communication.")
                ->setStack([
                    "Delphi 2009", "Delphi 2010", "Firebird 2.5", "C#", ".NET", ".NET 2.5 Framework", "SOAP", "Fast Report", "ACBR Libraries"
                ]),
            $producer("Alternativa Sistemas", "2009-05-01", "2010-08-01")
                ->setTitle("Internship in Software Development")
                ->setDescription("During my internship at Alternativa Sistemas, I developed key engineering skills:
• Project Development:
  - Worked on the migration of a legacy solution to new technology.
  - Collaborated with the Product Owner and Senior Developer, applying XP methodology.
  
• ERP System Improvement:
  - Developed features for ERP systems, focusing on multiple store environments.
  - Integrated an e-commerce platform with the ERP solution through SOAP communication.")
                ->setStack([
                    "Delphi 7", "Delphi 2009", "Delphi 2010", ".NET 2.5 (C#)", "Oracle 9i", "Firebird 2.5", "Fast Report", "ACBR Libraries", "SOAP"
                ]),

            $producer("University of Sao Paulo State (UNESP)", "2011-12-01", "2013-01-01")
                ->setTitle("Researcher")
                ->setDescription("As a researcher at UNESP, I focused on network transfer scalability:
• Simulation Development:
  - Developed simulations to explore network transfer scalability.
  - Worked closely with professors to ensure rigorous analysis.")
                ->setStack([
                    "MATLAB"
                ]),

        ];
    }


    public function getDependencies()
    {
        return [
            CompanyFixtures::class,
        ];
    }
}
