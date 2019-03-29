<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\EventService;
use App\Entity\Event;
use App\Entity\User;
use App\Form\EventType;


class EventController extends AbstractController
{
    /**
     * @Route("/events", name="event_list")
     */
    public function list( Request $request, EventService $eventService ){
        
        $query = $request->query->get( 'query' );
    
        $sort = $request->query->get( 'sort', 'id' );

        if( !empty( $query ) ){
            $events = $eventService->search( $query, $sort );
        }else{
            $events = $eventService->getAll( $sort );
        }

        return $this->render( 'event/list.html.twig', array(
            
            'events' => $events,
            'incomingCounter' => $eventService->countIncoming(),
        ));
        if ($sort == "price"){
            $stmt->orderBy('e.price', 'ASC');
        }elseif ($sort =="country") {
            $stmt->orderBy('e.country', 'DESC');
        }
    }

    
    /**
     * @Route("/event/add", name="event_add")
     */
    public function add( Request $request ){
        $event = new Event();
        $form = $this->createForm( EventType::class, $event );
        $form->handleRequest( $request );
        if( $form->isSubmitted() && $form->isValid() ){
            $event->setOwner( $this->getUser() );
            
            $em = $this->getDoctrine()->getManager();
            $em->persist( $event );
            $em->flush();
            return $this->redirectToRoute( 'event_show', array(
                'id' => $event->getId(),
            ));
        }
        return $this->render( 'event/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/event/{id}", name="event_display", requirements={"id"="\d+"})
     */
        public function display( EventService $eventService, $id ){
        $event = $eventService->get( $id );
        if( empty( $event ) ){
            return new Response( 'Event Not Found', 404 );
        }
        return $this->render( 'event/detail.html.twig', array(
            'event' => $event,
        ));
    }
    /**
     * @Route("/event/{id}/join", name="event_join", requirements={"id"="\d+"})
     */
    public function join( $id ){
        return $this->render( 'event/EventJoin.html.twig');
    }

    
}