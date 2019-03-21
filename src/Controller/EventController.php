<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class EventController extends AbstractController
{
    /**
     * @Route("/events", name="event_list")
     */
    public function list()
    {
        $events = array(
            array(
                'id' => 1,
                'name' => 'Helfest',
                'descrption' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'startAt' => '2019-06-12 18:30:00',
                'endAt' => '2019-06-15 04:00:00',
                'picture' => 'https://www.levignobledenantes-tourisme.com/wp-content/uploads/2018/05/new-hellfest-copyright-fdubray-ouest-france-levignobledenantes-e1526311399109.jpg',
                'price' => 50,
                'place' => 'New York',
            ),
            array(
                'id' => 2,
                'name' => 'Main Square',
                'descrption' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'startAt' => '2018-07-06 18:30:00',
                'endAt' => '2018-07-15 04:00:00',
                'picture' => 'http://lvdneng.rosselcdn.net/sites/default/files/dpistyles_v2/ena_16_9_extra_big/2017/07/02/node_186238/29436194/public/2017/07/02/B9712497202Z.1_20170702221603_000%2BG3H9C9ION.2-0.jpg?itok=sHGEpGf_',
                'price' => 20,
                'place' => 'Singapour',
            ),
            array(
                'id' => 3,
                'name' => 'Meetup Symfony',
                'descrption' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'startAt' => '2019-03-21 10:30:00',
                'endAt' => '2019-03-25 23:00:00',
                'picture' => 'https://www.peaks.fr/wp-content/uploads/2018/04/Rom_378x258_acf_cropped.jpg',
                'price' => null,
                'place' => 'San Fransisco',
            ),
            array(
                'id' => 4,
                'name' => 'Japan Expo',
                'descrption' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'startAt' => '2019-03-20 10:30:00',
                'endAt' => '2019-03-21 14:00:00',
                'picture' => 'http://s1.lprs1.fr/images/2018/07/05/7808010_e50afcba-7f85-11e8-be70-42320f9b42f8-1_1000x625.jpg',
                'price' => 5.50,
                'place' => 'Pékin',
            ),
        );
        return $this->render( 'event/list.html.twig', array(
            'events' => $events
        ));
    } 
    /**
     * @Route("/event/add", name="event_add")
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
    public function join($id)
    {
        return new Response('thomas');
    }   


}