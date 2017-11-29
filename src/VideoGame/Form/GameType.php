<?php

namespace VideoGame\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class GameType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('shortName')
          ->add('description', TextareaType::class)
          ->add('videoPath')->add('width')->add('height')->add('date',DateType::class,array('required' => false,
                                                      'widget' =>'single_text','html5' => false,
                                                      'format' =>'dd/MM/yyyy',
                                                      'attr' => array('class' => 'js-datepicker')))->add('visible')->add('active');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'VideoGame\Entity\Game'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'videogame_game';
    }


}
