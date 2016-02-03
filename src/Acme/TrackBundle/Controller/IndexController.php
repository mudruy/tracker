<?php

namespace Acme\TrackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\TrackBundle\Repository\TrackRepository;
use Acme\TrackBundle\Entity\Track;
use Symfony\Component\HttpFoundation\Response;
use Acme\TrackBundle\Track\CookieGuestDeterminant;
use Acme\TrackBundle\Track\DoctrineHelp;
use Doctrine\ORM\Tools\Pagination\Paginator;

class IndexController extends Controller
{
    public function bannerAction()
    {
        $ref = $this->getRequest()->headers->get('referer');
        $domain = parse_url($ref,  PHP_URL_HOST);
        if(!empty($domain)) {
            $em = $this->getDoctrine()->getManager();
            $repo_track = $em->getRepository('AcmeTrackBundle:Track');
            $track = $repo_track
                ->getCurrentTrack($domain);

            $repo_track->upRaw($track);
            if(CookieGuestDeterminant::isUnic($domain)){
                $repo_track->upUniq($track);
            }
        }
        return new Response();
    }
    
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $repo_track = $em->getRepository('AcmeTrackBundle:Track');
        $stat_query = $repo_track
            ->getStat();
        $page_size = 10;
        $stat = DoctrineHelp::paginate($stat_query, $page_size, $page);
        $thisPage = $page;
        $maxPages = ceil($stat->count() / $page_size);
        $routeName = 'acme_track_homepage';
        return $this->render('AcmeTrackBundle:Index:index.html.twig', 
                compact('stat', 'maxPages', 'thisPage', 'routeName'));
    }
}
