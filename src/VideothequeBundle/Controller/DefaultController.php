<?php

namespace VideothequeBundle\Controller;

use VideothequeBundle\Entity\Serie;
use VideothequeBundle\Entity\Film;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use VideothequeBundle\Form\SerieType;
use VideothequeBundle\Form\FilmType;

class DefaultController extends Controller
{
    public function indexAction($limit = 5)
    {
        //coulange.n@evogue.fr
        //
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository('VideothequeBundle:Film')
            ->createQueryBuilder('e')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
        $series = $em->getRepository('VideothequeBundle:Serie')
            ->createQueryBuilder('e')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
        return $this->render('VideothequeBundle:Default:index.html.twig',['films' => $films, 'series' => $series]);
    }

    public function createFilmAction(Request $request)
    {
        $film = New Film();
        $form = $this->createForm(FilmType::class, $film);

        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();
            return $this->redirectToRoute('videotheque_homepage');
        }
        return $this->render('VideothequeBundle:Default:create-film.html.twig', ['form' => $form->createView(), 'type' => 'Ajouter']);
    }

    public function createSerieAction(Request $request)
    {
        $serie = New Serie();
        $form = $this->createForm(SerieType::class, $serie);

        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();
            return $this->redirectToRoute('videotheque_homepage');
        }
        return $this->render('VideothequeBundle:Default:create-serie.html.twig', ['form' => $form->createView(), 'type' => 'Ajouter']);
    }

    public function filmsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository('VideothequeBundle:Film')
            ->findAll();
        return $this->render('VideothequeBundle:Default:films.html.twig',['films' => $films]);
    }

    public function seriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $series = $em->getRepository('VideothequeBundle:Serie')
            ->findAll();
        return $this->render('VideothequeBundle:Default:series.html.twig',['series' => $series]);
    }

    public function updateFilmAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('VideothequeBundle:Film');
        $film = $repository->find($id);
        $form = $this->createForm(FilmType::class, $film);
        // Si la requête est de type post (formulaire posté)
        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();
            return $this->redirectToRoute('videotheque_homepage');
        }
        return $this->render('VideothequeBundle:Default:create-film.html.twig', [
            'form' => $form->createView(), 'type' => 'Modifier']);
    }

    public function updateSerieAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('VideothequeBundle:Serie');
        $serie = $repository->find($id);
        $form = $this->createForm(SerieType::class, $serie);
        // Si la requête est de type post (formulaire posté)
        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($serie);
            $em->flush();
            return $this->redirectToRoute('videotheque_homepage');
        }
        return $this->render('VideothequeBundle:Default:create-serie.html.twig', [
            'form' => $form->createView(), 'type' => 'Modifier']);
    }

    public function deleteFilmAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('VideothequeBundle:Film');
        $film = $repository->find($id);
        // Nous informons doctrine que nous voulons supprimer ce film
        $em->remove($film);
        $em->flush();
        return $this->redirectToRoute('videotheque_homepage');
    }

    public function deleteSerieAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('VideothequeBundle:Serie');
        $serie = $repository->find($id);
        // Nous informons doctrine que nous voulons supprimer cette série
        $em->remove($serie);
        $em->flush();
        return $this->redirectToRoute('videotheque_homepage');
    }
}
