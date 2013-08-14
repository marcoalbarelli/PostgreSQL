<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mezzidicomunicazione
 *
 * @ORM\Table(name="mezzidicomunicazione")
 * @ORM\Entity
 */
class Mezzidicomunicazione
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=true)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="percorso", type="string", length=255, nullable=false)
     */
    private $percorso;

    /**
     * @var integer
     *
     * @ORM\Column(name="mezzodicomunicazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mezzidicomunicazione_mezzodicomunicazione_seq", allocationSize=1, initialValue=1)
     */
    private $mezzodicomunicazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Tipidicomunicazione
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Tipidicomunicazione")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipodicomunicazione", referencedColumnName="tipodicomunicazione")
     * })
     */
    private $tipodicomunicazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Soggetti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Soggetti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="soggetto", referencedColumnName="soggetto")
     * })
     */
    private $soggetto;


}
