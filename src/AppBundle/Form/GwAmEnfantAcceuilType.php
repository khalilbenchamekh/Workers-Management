<?php
/**
 * Created by PhpStorm.
 * User: RABAH Ismail
 * Date: 06/06/2017
 * Time: 10:55
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GwAmEnfantAcceuilType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder->add('dateDebutAcceuil' , DateType::class, array(
            'widget' => 'single_text',
            'html5' => false,
            'attr' => ['class' => 'EnfantAm_Date_Deb'],
            'format' => 'dd/MM/yyyy',
        ))
            ->add('dateFinAcceuil', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'EnfantAm_Date_fin'],
                'format' => 'dd/MM/yyyy',
            ))
            ->add('commentaire', TextareaType::class)
            ->add('agrementdispo')
            ->add('datedispo', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'EnfantAm_Date_Dispo'],
                'format' => 'dd/MM/yyyy',
            ));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GwEnfantacceuil',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_gwenfantacceuil';
    }


}
