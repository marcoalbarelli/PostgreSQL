<?php

namespace Scuola247\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IndirizziType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prefissovia')
            ->add('via')
            ->add('civico')
            ->add('isolato')
            ->add('palazzo')
            ->add('scala')
            ->add('piano')
            ->add('interno')
            ->add('cap')
            ->add('localita')
            ->add('provincia')
            ->add('tipoindirizzo')
            ->add('soggetto')
            ->add('nazione');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Scuola247\Bundle\CoreBundle\Entity\Indirizzi'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'scuola247_bundle_corebundle_indirizzitype';
    }
}
