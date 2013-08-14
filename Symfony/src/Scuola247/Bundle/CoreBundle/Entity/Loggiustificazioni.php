<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loggiustificazioni
 *
 * @ORM\Table(name="loggiustificazioni")
 * @ORM\Entity
 */
class Loggiustificazioni
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
     * @ORM\Column(name="loggiustificazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="loggiustificazioni_loggiustificazione_seq", allocationSize=1, initialValue=1)
     */
    private $loggiustificazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alunno", referencedColumnName="personafisica")
     * })
     */
    private $alunno;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="docente", referencedColumnName="personafisica")
     * })
     */
    private $docente;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="logrevisore", referencedColumnName="personafisica")
     * })
     */
    private $logrevisore;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Librettipersonaliconversazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Librettipersonaliconversazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="librettopersonaleconversazione", referencedColumnName="librettopersonaleconversazione")
     * })
     */
    private $librettopersonaleconversazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Giustificazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Giustificazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="giustificazione", referencedColumnName="giustificazione")
     * })
     */
    private $giustificazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Classi
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Classi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classe", referencedColumnName="classe")
     * })
     */
    private $classe;


}
