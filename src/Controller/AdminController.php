<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Form\CatType;
use App\PictureResizer\PictureReszier;
use claviska\SimpleImage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin/ajouter", name="cat_add")
     */
    public function catCreate(Request $request,EntityManagerInterface $em, PictureReszier $pictureReszier,EventDispatcher $dispatcher)
    {
        $cat = new cat();
        $catForm = $this->createForm(CatType::class,$cat);

        $catForm->handleRequest($request);

        if($catForm-> isSubmitted() && $catForm->isValid()){
           /** @var UploadedFile $brochureFile */
            $picture = $catForm->get('picture')->getData();

            $newFilename = sha1(uniqid()) . "." . $picture->guessExtension();

            $picture->move($this->getParameter('upload_dir'),$newFilename);


            $cat->setFilename($newFilename);
            $cat->setDateCreated(new \DateTime());
            $cat->setIsSold(false);

            $em->persist($cat);
            $em->flush();


        }

        return $this->render('admin/add.html.twig', [
           'catForm' => $catForm -> createView()
        ]);
    }
}
