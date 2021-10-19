<?php

namespace App\Controller;

use App\Form\TableChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/table", name="table")
 */
class TableController extends AbstractController
{
    /**
     * @Route("/select", name="table_select")
     */
    public function select(Request $request)
    {
        $form = $this->createForm(TableChoiceType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $n = $data['table_number'];
            $max = $data['table_max'];
            $color = $data['table_color'];

            $response = $this->render('table/index.html.twig', [
                'form' => $form->createView(),
                'n' => $n,
                'max' => $max,
                'color' => $color,
            ]);
        } else {
            $response = $this->render('table/index.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
    
    /**
     * @Route("/print/{n}/{max}", name="table_print")
     */
    public function index(int $n, int $max, Request $request): Response
    {
        $color = $request->get('c');
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
            'n' => $n,
            'max' => $max,
            'color' => $color,
        ]);
    }
}
