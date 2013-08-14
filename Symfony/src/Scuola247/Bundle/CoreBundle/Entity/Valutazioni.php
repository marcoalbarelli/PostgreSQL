<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Valutazioni
 *
 * @ORM\Table(name="valutazioni")
 * @ORM\Entity
 */
class Valutazioni
{
    /**
     * @var integer
     *
     * @ORM\Column(name="classe", type="integer", nullable=false)
     */
    private $classe;

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
     * @var integer
     *
     * @ORM\Column(name="alunno", type="integer", nullable=false)
     */
    private $alunno;

    /**
     * @var integer
     *
     * @ORM\Column(name="materia", type="integer", nullable=false)
     */
    private $materia;

    /**
     * @var integer
     *
     * @ORM\Column(name="voto", type="integer", nullable=false)
     */
    private $voto;

    /**
     * @var string
     *
     * @ORM\Column(name="visibilita", type="string", nullable=false)
     */
    private $visibilita;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=160, nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="valutazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="valutazioni_valutazione_seq", allocationSize=1, initialValue=1)
     */
    private $valutazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Tipivoto
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Tipivoto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipovoto", referencedColumnName="tipovoto")
     * })
     */
    private $tipovoto;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Argomenti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Argomenti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="agomento", referencedColumnName="argomento")
     * })
     */
    private $agomento;


}
