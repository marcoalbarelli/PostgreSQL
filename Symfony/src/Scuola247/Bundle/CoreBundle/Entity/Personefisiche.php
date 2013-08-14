<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personefisiche
 *
 * @ORM\Table(name="personefisiche")
 * @ORM\Entity
 */
class Personefisiche
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="personafisiche_personafisica_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=60, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cognome", type="string", length=60, nullable=false)
     */
    private $cognome;

    /**
     * @var string
     *
     * @ORM\Column(name="sesso", type="string", nullable=false)
     */
    private $sesso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="natoil", type="date", nullable=true)
     */
    private $natoil;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="decedutoil", type="date", nullable=true)
     */
    private $decedutoil;

    /**
     * @var string
     *
     * @ORM\Column(name="comunedinascita", type="string", length=60, nullable=true)
     */
    private $comunedinascita;

    /**
     * @var string
     *
     * @ORM\Column(name="codicefiscale", type="string", nullable=true)
     */
    private $codicefiscale;

    /**
     * @var string
     *
     * @ORM\Column(name="statocivile", type="string", nullable=true)
     */
    private $statocivile;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Soggetti
     *
     * @ORM\OneToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Soggetti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personafisica",  referencedColumnName="id", unique=true)
     * })
     */
    private $personafisica;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tutore",  referencedColumnName="id")
     * })
     */
    private $tutore;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="padre",  referencedColumnName="id")
     * })
     */
    private $padre;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Nazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Nazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nazionedinascita",  referencedColumnName="id")
     * })
     */
    private $nazionedinascita;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="madre",  referencedColumnName="id")
     * })
     */
    private $madre;


}
