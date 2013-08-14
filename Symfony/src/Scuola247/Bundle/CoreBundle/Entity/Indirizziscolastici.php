<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indirizziscolastici
 *
 * @ORM\Table(name="indirizziscolastici")
 * @ORM\Entity
 */
class Indirizziscolastici
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
     * @ORM\Column(name="annidicorso", type="integer", nullable=false)
     */
    private $annidicorso;

    /**
     * @var integer
     *
     * @ORM\Column(name="indirizzoscolastico", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="indirizziscolastici_indirizzoscolastico_seq", allocationSize=1, initialValue=1)
     */
    private $indirizzoscolastico;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Istituti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Istituti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="istituto", referencedColumnName="istituto")
     * })
     */
    private $istituto;


}
