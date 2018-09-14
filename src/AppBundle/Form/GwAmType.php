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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class GwAmType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('situationFamiliale', ChoiceType::class, array(
                'choices'  => array(
                    '-- Choisir une situation famille --' => 0,
                    'Mariés' => 1,
                    'Concubins' => 2,
                    'Célibataire' => 3,
                    'N\'est pas spécifié' => 4,
                ),)
            )
            ->add('civilite', ChoiceType::class, [
                'choices'  => [
                    '-- Choisir une civilité --' => 0,
                    'M.' => 1,
                    'Mme' => 2,
                ],
            ])
            ->add('nomNaissance')
            ->add('prenomNaissance')
            ->add('dateNaissance', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'Enfant_Date_Nais'],
                'format' => 'dd/MM/yyyy',
            ))
            ->add('numRue')
            ->add('rue1')
            ->add('rue2')
            ->add('cp')
            ->add('ville' , EntityType::class,
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
            ->add('quartier' , EntityType::class ,
                [
                    'class' => 'AppBundle:GwQuartier',
                    'em' => 'gramweb',
                    'query_builder' => function ( EntityRepository $er){
                        return $er->createQueryBuilder('u')
                            ->orderBy('u.titre', 'ASC');
                    },
                    'choice_label' => 'titre',
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
            ->add('rivoli')
            ->add('telFixe', TextType::class, array(
                'attr' => array(
                    'placeholder' => '00.00.00.00.00',
                    'data-mask' => '00.00.00.00.00',
                ),
            ))
            ->add('telPortable', TextType::class, array(
                'attr' => array(
                    'placeholder' => '00.00.00.00.00',
                    'data-mask' => '00.00.00.00.00',
                ),
            ))
            ->add('adresseMail')
//            ->add('nomUsage')
//            ->add('utilisatrice')
//            ->add('dateSaisie')
//            ->add('dateSuivi')
//            ->add('numFichie')
//            ->add('maminf')
//            ->add('mam')
//            ->add('dispononcommun')
//            ->add('dateInscription')
//            ->add('nomInfirmiere')
//            ->add('archive')
//            ->add('createdat')
//            ->add('updatedat')
//            ->add('sendsms')
//            ->add('sendmail')
//            ->add('emailEnvoi')
//            ->add('telEnvoi')
//            ->add('villeRelais')
//            ->add('nomJeuneF')
//            ->add('observatoire')
//            ->add('commentaire')
//            ->add('question')
//            ->add('premierdateagr')
//            ->add('commentaireagr')
//            ->add('lrfixe')
//            ->add('lrportable')
//            ->add('vehicule')
//            ->add('animal')
//            ->add('regroupement')
//            ->add('cta')
//            ->add('crecheFamiliale')
//            ->add('dispo')
//            ->add('inscriptionRelais')
//            ->add('nbEnfant')
//            ->add('formationasmat')
//            ->add('disponiblenonrensigne')
//            ->add('ana')
//            ->add('numAgrement')
//            ->add('user')
//            ->add('configurablefield4')
//            ->add('typeaccueil')
//            ->add('motifssuppression')
//            ->add('relais')
//            ->add('configurablefield3')
//            ->add('partenaire')
//            ->add('image')
            ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GwAm'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_gwam';
    }


}
