<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;

class DbController extends AbstractController{

    public function __construct(private ManagerRegistry $doctrine) {}

    public function editAction($id): Response
    {

        $category = $this->doctrine->getManager()->getRepository(Category::class)->findOneBy(['categoryid' => $id]);

        return $this->render('db/editcategory.html.twig', ['category' => $category]);
    }


    public function categoriesAction(Request $request): Response
    {
        $searchfor = $request->query->get('searchfor');
        if($searchfor){
            $categories = $this->doctrine->getManager()->getRepository(Category::class)->findBy(['categoryname'=> $searchfor]);
        }else{
            $categories = $this->doctrine->getManager()->getRepository(Category::class)->findAll();
        }

        return $this->render('db/categories.html.twig', ['categories' => $categories, 'searchfor' => $searchfor]);
    }

    public function createCategoryAction($name): Response
    {
        $category = new Category();
        $category->setCategoryname($name);
        $this->doctrine->getManager()->persist($category);
        $this->doctrine->getManager()->flush();
        return $this->render('db/editcategory.html.twig', ['category' => $category]);
    }

    /**
     * @Route ("/db/delete/{id}", methods={get})
     */
    public function deleteAction($id){
        $category = $this->doctrine->getManager()->getRepository(Category::class)->findOneBy([ 'categoryid' => $id]);
        if($category){
            $this->doctrine->getManager()->remove($category);
            $this->doctrine->getManager()->flush();
        }

        return $this->redirect('db/categories');
    }

}