<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class HomeController extends AbstractController
{

    public function show()
    {
        $form = $this->createFormBuilder()
            ->add('where',TextType::class)
            ->add('start_date',DateType::class)
            ->add('end_date',DateType::class)
            ->add('adults',IntegerType::class)
            ->add('childs',IntegerType::class)
            ->add('babies',IntegerType::class)
            ->add('save',SubmitType::class,['label' => 'Rechercher'])
            ->getForm();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form->createView(),
        ]);
    }
}
