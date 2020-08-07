<?php

namespace App\Controller;

use App\Entity\Bar;
use App\Form\BarType;
use Twig\Environment;
use App\Entity\BarCategory;
use App\Form\BarCategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BarController extends AbstractController
{

    /**
     * @Route("/barlist", name="barlist")
     */
    public function listbar(Request $request)
    {
    $bar = $this->getDoctrine()->getRepository(Bar::class)->find(3/*$id*/);

        return $this->render('bar/list.html.twig', [
            'controller_name' => 'BarController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/barone/{id}", name="getbar")
     */
    public function getbar(Request $request, $id=0)
    {
        //$bar = $this->getDoctrine()->getRepository(Bar::class)->find($id);
        $bar = $this->getDoctrine()->getRepository(Bar::class)->findByRepoDeFlo($id);

        //$entityManager->remove($bar);
        return $this->render('bar/getone.html.twig', [
            'controller_name' => 'BarController',
            'bar' => $bar,
        ]);
    }

    /**
     * @Route("/barcreate/{id}", name="barcreate")
     */
    public function index(Request $request,$id = 0)
    {
        //tu instancie l'entité bar pour en créer une nouvelle
        $bar = new Bar();
        //tu peut editer une entité en la chargeant avec un repository avant de l'inserer dans le formulaire
        if($id != 0)
            $bar = $this->getDoctrine()->getRepository(Bar::class)->find($id);
        //tu créer un entité manager pour flush ensuite les informations
        $entityManager = $this->getDoctrine()->getManager();
        // ...
        $form = $this->createForm(BarType::class, $bar);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $bar = $form->getData();
            //if($bar->getPassword() == $bar->getPasswordConfirm()){
                //$bar->setConfirmed(1);
                //$entityManager->remove($bar);
                $entityManager->persist($bar);
                $entityManager->flush();

            //}
            //return $this->redirectToRoute('task_success');
        }
        
        return $this->render('bar/index.html.twig', [
            'controller_name' => 'BarController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/barcategorycreate", name="barcategorycreate")
     */
    public function barcategorycreate(Request $request)
    {
        $barCategory = new BarCategory();
        $entityManager = $this->getDoctrine()->getManager();
        // ...



        $form = $this->createForm(BarCategoryType::class, $barCategory);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $barCategory = $form->getData();
            $barCategory->addBarCategory(1);

            //if($bar->getPassword() == $bar->getPasswordConfirm()){
                //$bar->setConfirmed(1);
                $entityManager->persist($barCategory);
                $entityManager->flush();

            //}
            //return $this->redirectToRoute('task_success');
        }
        
        return $this->render('bar/index.html.twig', [
            'controller_name' => 'BarController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/task_success", name="task_success")
     */
    public function task_success(Request $request)
    {

    }
}
