<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\Oferta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EmpresaController extends AbstractController
{
    /**
     * @Route("/empresa", name="empresa")
     */
    public function index()
    {
        $empreses = $this->getDoctrine()->getRepository(Empresa::class)->findAll();

        return $this->render('empresa/index.html.twig', ['empreses' => $empreses]);
    }
}
