<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipipersonegiuridiche
 *
 * @ORM\Table(name="tipipersonegiuridiche")
 * @ORM\Entity
 */
class Tipipersonegiuridiche
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=false)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipopersonagiuridica", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipipersonegiuridiche_tipopersonagiuridica_seq", allocationSize=1, initialValue=1)
     */
    private $tipopersonagiuridica;


}
