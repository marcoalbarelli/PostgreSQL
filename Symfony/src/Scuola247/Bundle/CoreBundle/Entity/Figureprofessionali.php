<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Figureprofessionali
 *
 * @ORM\Table(name="figureprofessionali")
 * @ORM\Entity
 */
class Figureprofessionali
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
     * @ORM\Column(name="figuraprofessionale", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="figureprofessionali_figuraprofessionale_seq", allocationSize=1, initialValue=1)
     */
    private $figuraprofessionale;


}
