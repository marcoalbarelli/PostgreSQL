<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loglezioni
 *
 * @ORM\Table(name="loglezioni")
 * @ORM\Entity
 */
class Loglezioni
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
     * @ORM\Column(name="descrizione", type="string", length=2048, nullable=false)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="loglezioni_loglezione_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logrevisore",  referencedColumnName="id")
     * })
     */
    private $logrevisore;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Materie
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Materie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="materia",  referencedColumnName="id")
     * })
     */
    private $materia;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Lezioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Lezioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lezione",  referencedColumnName="id")
     * })
     */
    private $lezione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Classi
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Classi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classe",  referencedColumnName="id")
     * })
     */
    private $classe;


}
