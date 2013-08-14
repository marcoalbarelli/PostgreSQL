<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Festivi
 *
 * @ORM\Table(name="festivi")
 * @ORM\Entity
 */
class Festivi
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="giorno", type="date", nullable=false)
     */
    private $giorno;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=true)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="festivo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="festivi_festivo_seq", allocationSize=1, initialValue=1)
     */
    private $festivo;

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
