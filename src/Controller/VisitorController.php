<?php
/**
 * Created by PhpStorm.
 * User: digital
 * Date: 2019-03-11
 * Time: 15:19
 */

namespace App\Controller;


use App\Entity\NodeVisitor;
use App\Entity\User;
use Doctrine\DBAL\Schema\Visitor\Visitor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use GraphAware\Neo4j\OGM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class VisitorController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     * @Route("/")
     */
    public function index(EntityManagerInterface $entityManager)
    {
           $visitor = $this->get('session')->get('visitorId');
           $userMLM = $entityManager->getRepository(NodeVisitor::class)->findOneBy(['name' => $visitor]);

           if(!$userMLM) {
               $user = new NodeVisitor();
               $user->setName($visitor);
               $entityManager->persist($user);
               $entityManager->flush($user);
           }
           return new JsonResponse([]);
    }
}