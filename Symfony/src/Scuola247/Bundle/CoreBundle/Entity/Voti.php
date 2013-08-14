<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voti
 *
 * @ORM\Table(name="voti")
 * @ORM\Entity
 */
class Voti
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=false)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="millesimi", type="smallint", nullable=false)
     */
    private $millesimi;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="voti_voto_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Metriche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Metriche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metrica",  referencedColumnName="id")
     * })
     */
    private $metrica;


}
