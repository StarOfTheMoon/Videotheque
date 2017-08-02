<?php

namespace VideothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use VideothequeBundle\Entity\Serie;

class SerieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('showrunner', TextType::class, array('label' => 'Showrunner'))
            ->add('principalActor', TextType::class, array('label' => 'Acteur Principal'))
            ->add('secondActor1', TextType::class, array('required' => false, 'label' => 'Acteur secondaire'))
            ->add('secondActor2', TextType::class, array('required' => false, 'label' => 'Acteur secondaire 2'))
            ->add('secondActor3', TextType::class, array('required' => false, 'label' => 'Acteur secondaire 3'))
            ->add('numSeason', IntegerType::class, array('required' => false, 'label' => 'Nombre de saison'))
            ->add('diffusionDate', DateType::class, array(
                'required' => false,
                'format' => 'ddMMyyyy',
                'label' => 'Date de diffusion'
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
            'data_class' => 'VideothequeBundle\Entity\Serie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'videothequebundle_serie';
    }


}
