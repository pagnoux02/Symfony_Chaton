<?php

namespace App\Controller;

use App\Entity\Cat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ApiController extends AbstractController
{
    /**
     * @Route("/api/v1/cart/add", name="api_add_to_cart",methods={"POST"})
     */
    public function addToCart(Request $request)
    {
        $json = $request->getContent();
        $data = json_decode($json);
        $catId = $data->id;

        return new JsonResponse([
            "status" => "ok",
            "data" => [

            ]
        ]);
    }



    /**
     * @Route("/api/v1/cat/get_name", name="api_cat_get_name",methods={"POST"})
     */
    public function cat_get_name(Request $request)
    {
        $json = $request->getContent();
        $data = json_decode($json);
        $catname = $data->name;

        $catRepo = $this->getDoctrine()->getRepository(Cat::class);
        $cats = $catRepo->findNameByLetter($catname);


        return new JsonResponse([
            "cats" =>$cats
        ]);
    }
}
