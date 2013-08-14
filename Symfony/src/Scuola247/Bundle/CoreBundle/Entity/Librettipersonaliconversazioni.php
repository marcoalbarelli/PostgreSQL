<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Librettipersonaliconversazioni
 *
 * @ORM\Table(name="librettipersonaliconversazioni")
 * @ORM\Entity
 */
class Librettipersonaliconversazioni
{
    /**
     * @var string
     *
     * @ORM\Column(name="oggetto", type="string", length=160, nullable=false)
     */
    private $oggetto;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoconversazione", type="string", nullable=false)
     */
    private $tipoconversazione;

    /**
     * @var integer
     *
     * @ORM\Column(name="librettopersonaleconversazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="librettipersonaliconversazioni_librettopersonaleconversazione_seq", allocationSize=1, initialValue=1)
     */
    private $librettopersonaleconversazione;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Librettipersonali
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Librettipersonali")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="librettopersonale", referencedColumnName="librettopersonale")
     * })
     */
    private $librettopersonale;


}
