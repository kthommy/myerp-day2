<?php

namespace App\Controller;

use App\Service\Greeter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * @Route("/")
     */
    public function index(Greeter $greeter)
    {  
        return $this->render('main/index.html.twig', [
            'greeting' => $greeter->greet($this->getUser()),
        ]);
    }
}
