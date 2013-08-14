<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Figureprofessionalidettagli
 *
 * @ORM\Table(name="figureprofessionalidettagli")
 * @ORM\Entity
 */
class Figureprofessionalidettagli
{
    /**
     * @var integer
     *
     * @ORM\Column(name="figuraprofessionaledettaglio", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="figureprofessionalidettagli_figuraprofessionaledettaglio_seq", allocationSize=1, initialValue=1)
     */
    private $figuraprofessionaledettaglio;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Soggetti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Soggetti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="soggetto", referencedColumnName="soggetto")
     * })
     */
    private $soggetto;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personafisica", referencedColumnName="personafisica")
     * })
     */
    private $personafisica;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Figureprofessionali
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Figureprofessionali")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="figuraprofessionale", referencedColumnName="figuraprofessionale")
     * })
     */
    private $figuraprofessionale;


}
