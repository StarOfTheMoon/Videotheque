<?php

namespace VideothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VideothequeBundle\Entity\Film;

class FilmType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('producer', TextType::class, array('label' => 'Réalisateur'))
            ->add('principalActor', TextType::class, array('label' => 'Acteur Principal'))
            ->add('secondActor', TextType::class, array('required' => false, 'label' => 'Acteur Secondaire'))
            ->add('secondActor2', TextType::class, array('required' => false,'label' => 'Acteur Secondaire 2'))
            ->add('releaseDate', DateType::class, array(
                'required' => false,
                'format' => 'ddMMyyyy',
                'label' => 'Date de sortie'
            ))
            ->add('budget', IntegerType::class, array(
                'required' => false,
                'label' => 'Budget',
                'attr' => [
                    'placeholder' => 'Budget en millions de dollars',
                ],
            ))
            ->add('rating', IntegerType::class, array(
                'label' => 'Note',
                'attr' => [
                    'placeholder' => 'Note sur 5',
                    'min' => 0,
                    'max' => 5,
                ],
            ))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VideothequeBundle\Entity\Film'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'videothequebundle_film';
    }


}
