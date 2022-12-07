<?php
namespace App\Controller;


use App\Entity\Asd;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class DbController extends AbstractController{

    public function __construct(private ManagerRegistry $doctrine) {}
    /**
     * @Route("/edit", name="editName")
     */
    public function editAction($id): Response

    {
        $item = $this->doctrine->getManager()->getRepository(Asd::class)->findOneBy(['id' => $id]);

        return $this->render('db/edititem.html.twig', ['name' => $item]);
    }


    public function itemsAction(Request $request): Response
    {
        $searchfor = $request->query->get('searchfor');
        if($searchfor){
            $items = $this->doctrine->getManager()->getRepository(Asd::class)->findBy(['name'=> $searchfor]);
        }else{
            $items = $this->doctrine->getManager()->getRepository(Asd::class)->findAll();
        }

        return $this->render('db/items.html.twig', ['items' => $items, 'searchfor' => $searchfor]);
    }

    public function createItemAction($name): Response
    {
        $item = new Asd();
        $item->setName($name);
        $this->doctrine->getManager()->persist($item);
        $this->doctrine->getManager()->flush();
        return $this->render('db/edititem.html.twig', ['name' => $item]);
    }


}