<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gruppiqualifichedettaglio
 *
 * @ORM\Table(name="gruppiqualifichedettaglio")
 * @ORM\Entity
 */
class Gruppiqualifichedettaglio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="gruppiqualifichedettaglio_gruppoqualifichedetaglio_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Qualifiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Qualifiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="qualifica",  referencedColumnName="id")
     * })
     */
    private $qualifica;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Gruppiqualifiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Gruppiqualifiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gruppoqualifiche",  referencedColumnName="id")
     * })
     */
    private $gruppoqualifiche;


}
