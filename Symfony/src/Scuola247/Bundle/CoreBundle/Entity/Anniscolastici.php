<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anniscolastici
 *
 * @ORM\Table(name="anniscolastici")
 * @ORM\Entity
 */
class Anniscolastici
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=false)
     */
    private $descrizione;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inizioannoscolastico", type="date", nullable=false)
     */
    private $inizioannoscolastico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finelezioni", type="date", nullable=false)
     */
    private $finelezioni;

    /**
     * @var integer
     *
     * @ORM\Column(name="annoscolastico", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="anniscolastici_annoscolastico_seq", allocationSize=1, initialValue=1)
     */
    private $annoscolastico;

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
