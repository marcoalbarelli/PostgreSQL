<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gruppiqualifiche
 *
 * @ORM\Table(name="gruppiqualifiche")
 * @ORM\Entity
 */
class Gruppiqualifiche
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
     * @ORM\Column(name="gruppoqualifiche", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="gruppiqualifiche_gruppoqualifiche_seq", allocationSize=1, initialValue=1)
     */
    private $gruppoqualifiche;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Istituti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Istituti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="istituto", referencedColumnName="istituto")
     * })
     */
    private $istituto;


}
