<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soggetti
 *
 * @ORM\Table(name="soggetti")
 * @ORM\Entity
 */
class Soggetti
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=false)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="tiposoggetto", type="string", nullable=false)
     */
    private $tiposoggetto;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="blob", nullable=true)
     */
    private $foto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="autorizzazionedatipersonali", type="date", nullable=true)
     */
    private $autorizzazionedatipersonali;

    /**
     * @var integer
     *
     * @ORM\Column(name="soggetto", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="soggetti_soggetto_seq", allocationSize=1, initialValue=1)
     */
    private $soggetto;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Soggetti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Soggetti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="soggettodiriferimento", referencedColumnName="soggetto")
     * })
     */
    private $soggettodiriferimento;

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
