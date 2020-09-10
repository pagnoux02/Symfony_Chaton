<?php
namespace App\PictureResizer;
use claviska\SimpleImage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;


class PictureReszier
{
    protected $parameterBag;
    protected $em;
    public function __construct(EntityManagerInterface $em,ParameterBagInterface $parameterBag)
    {
        $this->em = $em;
        $this->parameterBag = $parameterBag;
    }

    public function resize(string $filename){
            $simpleImage = new SimpleImage();

            $simpleImage
                ->fromFile($this->parameterBag->get('upload_dir').$filename)
                ->resize(1080)
                ->toFile($this->parameterBag->get('upload_dir').'_cat'.$filename);
}
}