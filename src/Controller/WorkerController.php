<?php

namespace App\Controller;

use App\Entity\Worker;
use App\Form\WorkerType;
use App\Repository\WorkerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/worker")
 */
class WorkerController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     */
    public function index(WorkerRepository $repository): Response
    {
        $form = $this
            ->createFormBuilder(null, ['method' => 'DELETE'])
            ->getForm();
        
        return $this->render('worker/index.html.twig', [
            'workers' => $repository->findAll(),
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/read/{id}")
     * @Method("GET")
     * 
     * @param Worker $worker
     * @return Response
     */
    public function read(Worker $worker): Response
    {
        return $this->render('worker/read.html.twig', ['worker' => $worker]);
    }
    
    /**
     * @Route("/create")
     * @Method({"GET", "PUT"})
     */
    public function create(
        Request $request,
        EntityManagerInterface $manager
    ): Response {
        $form = $this->createForm(WorkerType::class, new Worker(), [
            'method' => 'PUT',
        ]);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($form->getData());
            $manager->flush();
            
            $this->addFlash('success', 'worker.flash.saved');
            
            return $this->redirectToRoute('app_worker_index');
        }
        
        return $this->render('worker/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/edit/{id}")
     * @Method({"GET", "POST"})
     */
    public function edit(
        Worker $worker,
        Request $request,
        EntityManagerInterface $manager
    ): Response {
        $form = $this->createForm(WorkerType::class, $worker);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->flush();
            
            $this->addFlash('success', 'worker.flash.updated');
            
            return $this->redirectToRoute('app_worker_index');
        }
        
        return $this->render('worker/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/delete/{id}")
     * @Method("DELETE")
     * 
     * @param Worker $worker
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(
        Worker $worker,
        EntityManagerInterface $manager
    ): Response {
        $manager->remove($worker);
        $manager->flush();
        $this->addFlash('success', 'worker.flash.removed');
        
        return $this->redirectToRoute('app_worker_index');
    }
}
