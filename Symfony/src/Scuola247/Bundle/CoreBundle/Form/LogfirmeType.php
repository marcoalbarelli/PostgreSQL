<?php

namespace Scuola247\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LogfirmeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('logtimestamp')
            ->add('giorno')
            ->add('periododilezione')
            ->add('logrevisore')
            ->add('docente')
            ->add('firma')
            ->add('classe');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Scuola247\Bundle\CoreBundle\Entity\Logfirme'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'scuola247_bundle_corebundle_logfirmetype';
    }
}
