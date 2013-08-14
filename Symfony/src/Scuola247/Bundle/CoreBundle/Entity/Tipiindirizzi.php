<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipiindirizzi
 *
 * @ORM\Table(name="tipiindirizzi")
 * @ORM\Entity
 */
class Tipiindirizzi
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
     * @ORM\SequenceGenerator(sequenceName="tipiindirizzi_tipoindirizzo_seq", allocationSize=1, initialValue=1)
     */
    private $id;


}
