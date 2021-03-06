<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logassenze
 *
 * @ORM\Table(name="logassenze")
 * @ORM\Entity
 */
class Logassenze
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
     * @ORM\Column(name="rilevazione", type="string", nullable=false)
     */
    private $rilevazione;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="logassenze_logassenza_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logrevisore",  referencedColumnName="id")
     * })
     */
    private $logrevisore;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Giustificazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Giustificazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="giustificazione",  referencedColumnName="id")
     * })
     */
    private $giustificazione;

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
     * @var \Scuola247\Bundle\CoreBundle\Entity\Assenze
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Assenze")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="assenza",  referencedColumnName="id")
     * })
     */
    private $assenza;


}
