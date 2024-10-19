<?php

namespace App\Controller;

use App\Service\PersonService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class IndexController extends AbstractController
{
    #[Route('/')]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }

    #[Route(
        path: '/cv/{user}',
        name: 'curriculum',
        methods: ['GET']
    )]
    public function getData(
        PersonService       $service,
        SerializerInterface $serializer,
        string              $user,
        #[MapQueryParameter] int $size,
        #[MapQueryParameter] int $page,
    ): JsonResponse
    {
        $cv = $service->getDataOf($user, $size, $page);

        return new JsonResponse(
            data: $serializer->serialize($cv, 'json'),
            status: Response::HTTP_FOUND,
            json: true,
        );
    }
}
