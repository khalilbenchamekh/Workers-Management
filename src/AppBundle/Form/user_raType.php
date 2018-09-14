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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class user_raType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')
        ->add('email')
        // ->add('roles')
        ->add('enabled');
        
        // ->add('roles', CollectionType::class, array(
        //     'entry_type'   => ChoiceType::class,
        //     'entry_options'  => array(
        //         'choices'  => array( 'ROLE_ADMIN' => 'ROLE_ADMIN', 'ROLE_PARENT' => 'ROLE_PARENT', 'ROLE_ASSMAT' => 'ROLE_ASSMAT' ),
        //     ),
        // ));


    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\user_ra'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user_ra';
    }


}
