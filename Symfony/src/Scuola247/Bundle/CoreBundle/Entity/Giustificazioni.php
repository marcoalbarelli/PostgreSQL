<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Giustificazioni
 *
 * @ORM\Table(name="giustificazioni")
 * @ORM\Entity
 */
class Giustificazioni
{
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
     * @ORM\SequenceGenerator(sequenceName="giustificazioni_giustificazione_seq", allocationSize=1, initialValue=1)
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
     *   @ORM\JoinColumn(name="alunno",  referencedColumnName="id")
     * })
     */
    private $alunno;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Librettipersonaliconversazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Librettipersonaliconversazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="librettopersonaleconversazione",  referencedColumnName="id")
     * })
     */
    private $librettopersonaleconversazione;

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
