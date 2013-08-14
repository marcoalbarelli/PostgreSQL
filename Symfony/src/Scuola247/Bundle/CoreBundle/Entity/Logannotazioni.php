<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logannotazioni
 *
 * @ORM\Table(name="logannotazioni")
 * @ORM\Entity
 */
class Logannotazioni
{
    /**
     * @var string
     *
     * @ORM\Column(name="logtimestamp", type="string", nullable=false)
     */
    private $logtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="giorno", type="date", nullable=false)
     */
    private $giorno;

    /**
     * @var integer
     *
     * @ORM\Column(name="periododilezione", type="integer", nullable=false)
     */
    private $periododilezione;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoannotazione", type="string", nullable=true)
     */
    private $tipoannotazione;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=2048, nullable=false)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="logannotazioni_logannotazione_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logrevisore",  referencedColumnName="id")
     * })
     */
    private $logrevisore;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alunno",  referencedColumnName="id")
     * })
     */
    private $alunno;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="docente",  referencedColumnName="id")
     * })
     */
    private $docente;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Classi
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Classi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classe",  referencedColumnName="id")
     * })
     */
    private $classe;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Annotazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Annotazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="annotazione",  referencedColumnName="id")
     * })
     */
    private $annotazione;


}
