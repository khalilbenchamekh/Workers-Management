<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 24/05/2017
 * Time: 10:45
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class GwParentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $builder->add('dateSaisie')->add('dateDemande')->add('numFiche')->add('situationFamille')->add('statutFiche')->add('zoneAppartenance')->add('archived')->add('createdat')->add('updatedat')->add('sendsms')->add('autorphoto')->add('participeanim')->add('sendmail')->add('emailEnvoi')->add('telEnvoi')->add('telUrgence')->add('commentaire');
        $builder
//            ->add('numFiche')

            ->add('situationFamille', ChoiceType::class, array(
                    'choices'  => array(
                        '-- Choisir une situation famille --' => 0,
                        'Mariés' => 1,
                        'Concubins' => 2,
                        'Célibataire' => 3,
                        'N\'est pas spécifié' => 4,
                    ),
                )
            )
            ->add('statutparent' , EntityType::class,
                [
                    'class' => 'AppBundle:GwStatutparent',
                    'em' => 'gramweb',
                    'query_builder' => function( EntityRepository $er){
                        return $er->createQueryBuilder('u')
                            ->orderBy( 'u.title' , 'ASC');
                    },
                    'choice_label' => 'title',
                ]
            )
            ->add( 'relais' , EntityType::class ,
                [
                    'class' => 'AppBundle:GwRelaisContact',
                    'em' => 'gramweb',
                    'query_builder' => function( EntityRepository $er ){
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.title' , 'ASC');
                    },
                    'choice_label' => 'title',
                ]
            )
            ->add('sendsms')
            ->add('autorphoto')
            ->add('participeanim')
            ->add('sendmail')
            ->add('emailEnvoi')
            ->add('telEnvoi', TextType::class, array(
                'attr' => array(
                    'placeholder' => '00.00.00.00.00',
                    'data-mask' => '00.00.00.00.00',
//                    'size' => 13,
                ),
            ))
            ->add('telUrgence', TextType::class, array(
                'attr' => array(
                    'placeholder' => '00.00.00.00.00',
                    'data-mask' => '00.00.00.00.00',
                ),
            ));
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GwParent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_gwparent';
    }


}
