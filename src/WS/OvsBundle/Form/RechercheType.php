<?php

namespace WS\OvsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RechercheType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('type', 'choice', array('choices' => array('ville' => 'ville', 'sport' => 'sport')))
                ->add('recherche', 'text')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
//            'data_class' => 'WS\OvsBundle\Entity\Sport'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ws_ovsbundle_recherche';
    }

}
