<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indirizzi
 *
 * @ORM\Table(name="indirizzi")
 * @ORM\Entity
 */
class Indirizzi
{
    /**
     * @var string
     *
     * @ORM\Column(name="prefissovia", type="string", length=15, nullable=true)
     */
    private $prefissovia;

    /**
     * @var string
     *
     * @ORM\Column(name="via", type="string", length=160, nullable=true)
     */
    private $via;

    /**
     * @var string
     *
     * @ORM\Column(name="civico", type="string", length=15, nullable=true)
     */
    private $civico;

    /**
     * @var string
     *
     * @ORM\Column(name="isolato", type="string", length=60, nullable=true)
     */
    private $isolato;

    /**
     * @var string
     *
     * @ORM\Column(name="palazzo", type="string", length=60, nullable=true)
     */
    private $palazzo;

    /**
     * @var string
     *
     * @ORM\Column(name="scala", type="string", length=60, nullable=true)
     */
    private $scala;

    /**
     * @var string
     *
     * @ORM\Column(name="piano", type="string", length=15, nullable=true)
     */
    private $piano;

    /**
     * @var string
     *
     * @ORM\Column(name="interno", type="string", length=15, nullable=true)
     */
    private $interno;

    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=15, nullable=true)
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="localita", type="string", length=160, nullable=true)
     */
    private $localita;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=160, nullable=true)
     */
    private $provincia;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="indirizzi_indirizzo_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Tipiindirizzi
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Tipiindirizzi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoindirizzo",  referencedColumnName="id")
     * })
     */
    private $tipoindirizzo;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Soggetti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Soggetti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="soggetto",  referencedColumnName="id")
     * })
     */
    private $soggetto;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Nazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Nazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nazione",  referencedColumnName="id")
     * })
     */
    private $nazione;


}
