<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipivoto
 *
 * @ORM\Table(name="tipivoto")
 * @ORM\Entity
 */
class Tipivoto
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=60, nullable=false)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipivoto_tipovoto_seq", allocationSize=1, initialValue=1)
     */
    private $id;


}
