<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Valutazioniqualifiche
 *
 * @ORM\Table(name="valutazioniqualifiche")
 * @ORM\Entity
 */
class Valutazioniqualifiche
{
    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=160, nullable=true)
     */
    private $note;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="valutazioniqualifiche_valutazionequalifica_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Voti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Voti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="voto",  referencedColumnName="id")
     * })
     */
    private $voto;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Valutazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Valutazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="valutazione",  referencedColumnName="id")
     * })
     */
    private $valutazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Qualifiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Qualifiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="qualifica",  referencedColumnName="id")
     * })
     */
    private $qualifica;


}
