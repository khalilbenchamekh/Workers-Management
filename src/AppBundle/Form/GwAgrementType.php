<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class GwAgrementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('num')
            ->add('nom' , EntityType::class,
                [
                    'class' => 'AppBundle:GwNomagrement',
                    'em'=> 'gramweb',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                ]
            )
            ->add('definition', EntityType::class,
                [
                    'class' => 'AppBundle:GwDefinitionagrement',
                    'em'=> 'gramweb',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                ]
            )
            ->add('statut', EntityType::class,
                [
                    'class' => 'AppBundle:GwStatutagrement',
                    'em'=> 'gramweb',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                ]
            )
            ->add('datedebut', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'Enfant_Date_Nais'],
                'format' => 'dd/MM/yyyy',
            ))
            ->add('datefin', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'Enfant_Date_Nais'],
                'format' => 'dd/MM/yyyy',
            ))
            ->add('disponible')
            ->add('datelibre', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'Enfant_Date_Nais'],
                'format' => 'dd/MM/yyyy',
            ))
            ->add('details')
//            ->add('disponiblenonrensigne')
//            ->add('createdat')
//            ->add('assmat')
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GwAgrement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_gwagrement';
    }


}
