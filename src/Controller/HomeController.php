<?php

namespace App\Controller;

use App\Entity\Search;
use App\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{

    public function show(Request $request)
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($request->request);
            return $this->redirectToRoute('connexion');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'searchForm' => $form->createView(),
        ]);
    }
}
