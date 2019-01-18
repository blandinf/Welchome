<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/owner")
 */
class OwnerController extends AbstractController{
    /**
     * @Route("/", name="owner", methods={"GET"})
     */
    public function index(){
        return $this->render('owner/index.html.twig');
    }

}