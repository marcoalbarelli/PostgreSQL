<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annotazioni
 *
 * @ORM\Table(name="annotazioni")
 * @ORM\Entity
 */
class Annotazioni
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
     * @ORM\Column(name="tipoannotazione", type="string", nullable=false)
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
     * @ORM\Column(name="annotazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="annotazioni_annotazione_seq", allocationSize=1, initialValue=1)
     */
    private $annotazione;

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
     * @var \Scuola247\Bundle\CoreBundle\Entity\Classi
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Classi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classe", referencedColumnName="classe")
     * })
     */
    private $classe;


}
