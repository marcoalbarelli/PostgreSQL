<?php

namespace Scuola247\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonegiuridicheType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('partitaiva')
            ->add('codicefiscale')
            ->add('personagiuridica')
            ->add('tipopersonagiuridica')
            ->add('nazione');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Scuola247\Bundle\CoreBundle\Entity\Personegiuridiche'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'scuola247_bundle_corebundle_personegiuridichetype';
    }
}
