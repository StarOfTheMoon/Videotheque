<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Form\PostType;


class DefaultController extends Controller
{
    public function indexAction()
    {
        // on fait appel a l'entity manager
        $em = $this->getDoctrine()->getManager();
        //on récupère les posts avec le repository
        $posts = $em->getRepository('BlogBundle:Post')
            ->findAll();
        //on les return dans la vue
        return $this->render('BlogBundle:Default:index.html.twig',[
            // Variable des posts pour la vue
            'posts' => $posts,
        ]);
    }

    public function postAction($id) // $id c'est le parametre necessaire a la fonction.
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('BlogBundle:Post')->find($id);  // tu peux le faire comme ça aussi.
        return $this->render('BlogBundle:Default:post.html.twig',['post'=>$post]);
    }

    public function createPostAction(Request $request)
    {
        // on crée l'entité
        $post = New Post();
        //on récupère et crée le form
        $form = $this->createForm(PostType::class, $post);

        if($request->isMethod('POST')) {
            // On fait le lien entre la requête et le formulaire
            $form->handleRequest($request);
            // Maintenant, la variable $post contient les valeurs entrées dans le formulaire.
            // On peut donc enregistrer $post avec Doctrine.
            $em = $this->getDoctrine()->getManager();
            // Je prépare l'enregistrement de mon post
            $em->persist($post);
            //Je valide les changements préparés sinon ca ne fonctionnera pas
            $em->flush();
            return $this->redirectToRoute('blog_homepage');
        }
        return $this->render('BlogBundle:Default:create-post.html.twig', ['form' => $form->createView()]);
    }

    public function postsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('BlogBundle:Post')
            ->findAll();
        //on les return dans la vue
        return $this->render('BlogBundle:Default:posts.html.twig',[
            // Variable des posts pour la vue
            'posts' => $posts,
        ]);
    }

    public function updatePostAction(Request $request, $id)
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $post = $repository->find($id);
        $form = $this->createForm(PostType::class, $post);
        // Si la requête est de type post (formulaire posté)
        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('blog_posts');
        }
        return $this->render('VideothequeBundle:Default:create-serie.html.twig', [
            'form' => $form->createView(), 'type' => 'Modifier']);
    }

    public function deletePostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $post = $repository->find($id);
        // Nous informons doctrine que nous voulons supprimer ce film
        $em->remove($post);
        $em->flush();
        return $this->redirectToRoute('blog_posts');
    }

}
