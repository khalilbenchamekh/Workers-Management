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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class GwResponsable2Type extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('civilite', ChoiceType::class, [
                'choices'  => [
                    '-- Choisir une civilité --' => 0,
                    'M.' => 1,
                    'Mme' => 2,
                ],
            ])
            ->add('nom')
            ->add('prenom')
            ->add('cp')
            ->add('numRue')
            ->add('rue1')
            ->add('rue2')
            ->add('rivoli')
            ->add('telPerso', TextType::class, array(
                'attr' => array(
                    'placeholder' => '00.00.00.00.00',
                    'data-mask' => '00.00.00.00.00',
                ),
            ))
            ->add('telPro', TextType::class, array(
                'attr' => array(
                    'placeholder' => '00.00.00.00.00',
                    'data-mask' => '00.00.00.00.00',
                ),
            ))
            ->add('adresseMail')
            ->add('adresseMailPro')
//            ->add('latitude')
//            ->add('longitude')
            ->add('portable', TextType::class, array(
                'attr' => array(
                    'placeholder' => '00.00.00.00.00',
                    'data-mask' => '00.00.00.00.00',
                ),
            ))
            ->add('fax')
            ->add('profession', EntityType::class,
                [
                    'class' => 'AppBundle:GwProfession',
                    'em' => 'gramweb',
                    'query_builder' => function( EntityRepository $er){
                        return $er->createQueryBuilder('u')
                            ->orderBy( 'u.nom' , 'ASC');
                    },
                    'choice_label' => 'nom',
                ]
            )
            ->add('quartier' , EntityType::class,
                [
                    'class' => 'AppBundle:GwQuartier',
                    'em' => 'gramweb',
                    'query_builder' => function( EntityRepository $er){
                        return $er->createQueryBuilder('u')
                            ->orderBy( 'u.titre' , 'ASC');
                    },
                    'choice_label' => 'titre',
                ]
            )
            ->add('lieutravail', EntityType::class ,
                [
                    'class' => 'AppBundle:GwLieutravail',
                    'em'=> 'gramweb',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                ]
            )
            ->add('ville', EntityType::class,
                [
                    'class' => 'AppBundle:GwVille',
                    'em'=> 'gramweb',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                ]
            )
            ->add('secteur', EntityType::class ,
                [
                    'class' => 'AppBundle:GwSecteur',
                    'em' => 'gramweb',
                    'query_builder' => function ( EntityRepository $er){
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.titre', 'ASC');
                    },
                    'choice_label' => 'titre',
                ]
            )
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GwResponsable2'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_gwresponsable2';
    }


}
