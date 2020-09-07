<?php

namespace App\Controller;

use App\Entity\Cat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChatonController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $catRepo = $this->getDoctrine()->getRepository(Cat::class);
        $cats = $catRepo->findBy(["is_sold" => 1]);

        return $this->render('chaton/home.html.twig',
            ["cats"=> $cats]);
    }
    /**
     * @Route("/detail/{id}",name="detail"),
     * requirements={"id": "\d+"})
     *
     */
    public function detail($id, Request $request)
    {
        $catRepo = $this->getDoctrine()->getRepository(Cat::class);
        $cat = $catRepo->find($id);
        return $this->render("chaton/detail.html.twig",
            ["cat" => $cat]);
    }
}
