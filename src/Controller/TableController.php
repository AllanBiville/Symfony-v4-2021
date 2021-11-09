<?php

namespace App\Controller;

use App\Entity\Table;
use App\Form\TableChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

            $table = new Table($n);
            $calculations = $table->calcMultiply($max);

            $response = $this->render('table/index.html.twig', [
                'calculations' => $calculations,
                'color' => $color,
                'n' => $n,
            ]);
        } else {
            $response = $this->render('table/vue.html.twig', [
                'formulaire' => $form->createView(),
            ]);
        }
        return $response;
    }
    
    /**
     * @Route("/print/{n}/{max}/{color}", name="table_print")
     */
    public function index(int $n, int $max, string $color, Request $request): Response
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
