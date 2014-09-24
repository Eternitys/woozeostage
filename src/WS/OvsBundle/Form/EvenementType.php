<?php

namespace WS\OvsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EvenementType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('date', 'date')
                ->add('nom', 'text')
                ->add('heure', 'time')
                ->add('inscrit', 'integer', array('attr' => array('min' => 2), 'data' => 2))
                ->add('sport', 'entity', array(
                    'class' => 'WSOvsBundle:Sport',
                    'property' => 'nom'
                ))
                ->add('descriptif', 'textarea')
                ->add('adresse', 'textarea')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'WS\OvsBundle\Entity\Evenement'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ws_ovsbundle_evenement';
    }

}
