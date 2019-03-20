<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;



class EventController extends AbstractController
{
    /**
     * @Route("/events", name="event_list")
     */
    public function list()
    {
        return new Response('alcool');
    }  
    /**
     * @Route("/event/add", name="envent_add")
     */
    public function add()
    {
        return new Response('je suis con');
    }   


     /**
     * @Route("/event/{id}", name="event_display", requirements={"id"="\d+"})
     */
    public function display($id)
    {
        return new Response('la connerie'. $id);
    }   



    /**
     * @Route("/event/{id}/join", name="event_join", requirements={"id"="\d+"})
     */
    public function join()
    {
        return new Response('thomas');
    }   


}