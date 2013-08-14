<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Librettipersonalimessaggiletti
 *
 * @ORM\Table(name="librettipersonalimessaggiletti")
 * @ORM\Entity
 */
class Librettipersonalimessaggiletti
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lettoil", type="datetime", nullable=false)
     */
    private $lettoil;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="librettipersonalimessaggiletti_librettopersonalemessaggioletto_seq", allocationSize=1, initialValue=1)
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
     * @var \Scuola247\Bundle\CoreBundle\Entity\Librettipersonalimessaggi
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Librettipersonalimessaggi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="librettopersonalemessaggio",  referencedColumnName="id")
     * })
     */
    private $librettopersonalemessaggio;


}
