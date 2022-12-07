<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class DefaultController extends AbstractController{

    #[Route('/')]

    public function index(LoggerInterface $logger): Response
    {
        $logger->info('I just got the logger');
        return new Response("Hey");
    }

    public function blogIndex(): Response
    {
        return new Response("Blog");
    }
}