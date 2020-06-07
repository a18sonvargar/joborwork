<?php

namespace App\Controller;

use App\Entity\Oferta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OfertaController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        $ofertes = $this->getDoctrine()->getRepository(Oferta::class)->findAll();

        return $this->render('oferta/index.html.twig', ['ofertes' => $ofertes]);
    }
}
