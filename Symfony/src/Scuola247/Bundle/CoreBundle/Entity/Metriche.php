<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metriche
 *
 * @ORM\Table(name="metriche")
 * @ORM\Entity
 */
class Metriche
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="metriche_metrica_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Istituti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Istituti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="istituto",  referencedColumnName="id")
     * })
     */
    private $istituto;


}
