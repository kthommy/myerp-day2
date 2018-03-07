<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/job")
 */
class JobController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function index(JobRepository $repository): Response
    {
        return $this->render('job/index.html.twig', [
            'jobs' => $repository->findAll(),
        ]);
    }
}
