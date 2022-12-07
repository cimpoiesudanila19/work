<?php

namespace App\Controller;

use App\Model\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigsControllerPhpController extends AbstractController
{


    public function twigsIndex(): Response
    {
        return $this->render('twigs_controller_php/index.html.twig', [
            'message' => 'yo',
            'people' => Person::CreateTestList(),
            'flag' => 1
        ]);
    }

    public function detailsIndex(): Response
    {
        return $this->render('twigs_controller_php/details.html.twig', [
            'message' => 'details',
        ]);
    }

}
