<?php

// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = rand(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }


     /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        return new Response(
            json_encode($data),
            200,
            array('Content-Type' => 'application/json')
        );
    }


     /**
     * @Route("/api/lucky/number2")
     */
    public function apiNumber2Action()
    {
        $data = array(
            'lucky_number' => rand(0, 100),
        );

        // calls json_encode and sets the Content-Type header
        return new JsonResponse($data);
    }




     /**
     * @Route("/lucky/numbers/{count}")
     */
    public function numbersAction($count)
    {
        $numbers = array();
        for ($i = 0; $i < $count; $i++) {
            $numbers[] = rand(0, 100);
        }
        $numbersList = implode(', ', $numbers);

        // $html = $this->container->get('templating')->render(
        //     'lucky/number.html.twig',
        //     array('luckyNumberList' => $numbersList)
        // );
        // return new Response($html);


        // render: a shortcut that does the same as above
        return $this->render(
            'lucky/number.html.twig',
            array('luckyNumberList' => $numbersList)
        );
        
    }




}
