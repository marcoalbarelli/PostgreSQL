<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Librettipersonalimessaggi
 *
 * @ORM\Table(name="librettipersonalimessaggi")
 * @ORM\Entity
 */
class Librettipersonalimessaggi
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fattoil", type="datetime", nullable=false)
     */
    private $fattoil;

    /**
     * @var string
     *
     * @ORM\Column(name="messaggio", type="string", length=2048, nullable=false)
     */
    private $messaggio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipomessaggio", type="string", nullable=false)
     */
    private $tipomessaggio;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="librettipersonalimessaggi_librettopersonalemessaggio_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personafisica",  referencedColumnName="id")
     * })
     */
    private $personafisica;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Librettipersonaliconversazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Librettipersonaliconversazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="librettopersonaleconversazione",  referencedColumnName="id")
     * })
     */
    private $librettopersonaleconversazione;


}
