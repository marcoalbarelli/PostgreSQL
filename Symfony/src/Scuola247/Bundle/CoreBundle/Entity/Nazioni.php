<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nazioni
 *
 * @ORM\Table(name="nazioni")
 * @ORM\Entity
 */
class Nazioni
{
    /**
     * @var string
     *
     * @ORM\Column(name="isoa2", type="string", nullable=false)
     */
    private $isoa2;

    /**
     * @var string
     *
     * @ORM\Column(name="isoa3", type="string", nullable=false)
     */
    private $isoa3;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=false)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="nazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="nazioni_nazione_seq", allocationSize=1, initialValue=1)
     */
    private $nazione;


}
