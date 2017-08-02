<?php
namespace HelloWorldBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HelloWorldBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use HelloWorldBundle\Form\UserType;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HelloWorldBundle:Default:index.html.twig', [
            'couleur' => 'rouge',
            'liste_couleurs' => ['rouge', 'vert', 'bleu', 'blanc', 'orange'],
            'user' => (object)['name' => 'Nicolas'],
            'users' => [
                //Exercice : afficher les utilisateurs dans un tableau HTML
                (object)[
                    'pseudo' => 'Vestibule',
                    'age' => 24,
                ],
                (object)[
                    'pseudo' => 'Gérard',
                    'age' => 12,
                ],
                (object)[
                    'pseudo' => 'Aurélien',
                    'age' => 25,
                ],
                (object)[
                    'pseudo' => 'Théo',
                    'age' => 32,
                ],
            ]
        ]);
    }
    public function createUserAction(Request $request)
    {
        // Création de l'entité
        $user = new User;

        // On crée le FormBuilder grâce au service from factory
        // On récupère le formBuider. Cet objet nest pas le formulaire mais un consructeur de formulaire. Il crée un formulaire autour de l'objet $user.
        //$formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $user);
        // On récupère directement le formulaire grâce à notre class UserType.
        $form = $this->createForm(UserType::class, $user);
        // On lui dit "ajoute les champs pseudo, âge et email et un bouton save"
        // $formBuilder
        // 	->add('pseudo',	TextType::class)
        // 	->add('age', 	TextType::class)
        // 	->add('email', 	TextType::class)
        // 	->add('save', 	SubmitType::class);

        // On génère le formulaire à partir du formBuilder
        // $form = $formBuilder->getForm();
        // Si la requête est de type post (formulaire posté)
        if($request->isMethod('POST')) {
            // On fait le lien entre la requête et le formulaire
            $form->handleRequest($request);
            // Maintenant, la variable $user contient les valeurs entrées dans le formulaire.
            // On peut donc enregistrer $user avec Doctrine.
            $em = $this->getDoctrine()->getManager();
            // Je prépare l'enregistrement de mon User
            $em->persist($user);
            //Je valide (ou 'commit') les changements préparés
            $em->flush();
            return $this->redirectToRoute('hello_world_user', ['id' => $user->getId()]);
        }
        return $this->render('HelloWorldBundle:Default:create-user.html.twig', [
            'form' => $form->createView()]);
    }
    public function updateUserAction(Request $request, $id)
    {
        // Récupération du repository
        $repository = $this->getDoctrine()->getRepository('HelloWorldBundle:User');
        // Récupération de l'entité User correspondante à $id
        $user = $repository->find($id);
        // On récupère directement le formulaire grâce à notre class UserType.
        $form = $this->createForm(UserType::class, $user);
        // Si la requête est de type post (formulaire posté)
        if($request->isMethod('POST')) {
            // On fait le lien entre la requête et le formulaire
            $form->handleRequest($request);
            // Maintenant, la variable $user contient les valeurs entrées dans le formulaire.
            // On peut donc enregistrer $user avec Doctrine.
            $em = $this->getDoctrine()->getManager();
            // Je prépare l'enregistrement de mon User
            $em->persist($user);
            //Je valide (ou 'commit') les changements préparés
            $em->flush();
            return $this->redirectToRoute('hello_world_user', ['id' => $user->getId()]);
        }
        return $this->render('HelloWorldBundle:Default:create-user.html.twig', [
            'form' => $form->createView()]);
    }
    public function getUserAction($id)
    {
        // Récupération du UserRepository
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('HelloWorldBundle:User');
        // Récupération de l'entité correspondante à $id
        $user = $repository->find($id);
        return $this->render('HelloWorldBundle:Default:user.html.twig', [
            'user' => $user
        ]);
    }
    public function usersAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getRepository('HelloWorldBundle:User');
        $users = $repository->findAll();
        return $this->render('HelloWorldBundle:Default:index.html.twig', [
            'users' => $users
        ]);
    }
    public function deleteUserAction($id)
    {
        // Récupération de l'entity manager
        $em = $this->getDoctrine()->getManager();
        // Récupération du repository User
        $repository = $this->getDoctrine()->getRepository('HelloWorldBundle:User');
        //Récupération de l'user en base
        $user = $repository->find($id);
        // Nous informons doctrine que nous voulons supprimer ce user
        $em->remove($user);
        // Valide les changements effectués
        $em->flush();
        // On retourne vers la liste des users
        return $this->redirectToRoute('hello_world_users');
    }
}
