<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class GwEnfantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prenom')
            ->add('dateNaissance', DateType::class, array(
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => ['class' => 'Enfant_Date_Nais'],
                    'format' => 'dd/MM/yyyy',
                )
            )
//            ->add('age')
//            ->add('details')
            ->add('dateDebutAccueilSouhaite', DateType::class, array(
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => ['class' => 'Enfant_Date_dateDebut'],
                    'format' => 'dd/MM/yyyy',
                )
            )
            ->add('lieuscolarisation', EntityType::class,
                [
                    'class' => 'AppBundle:GwLieuscolarisation',
                    'em' => 'gramweb',
                    'query_builder' => function( EntityRepository $er){
                        return $er->createQueryBuilder('u')
                            ->orderBy( 'u.lieuscolarisation' , 'ASC');
                    },
                    'choice_label' => 'lieuscolarisation',
                ] );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GwEnfant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_gwenfant';
    }


}
