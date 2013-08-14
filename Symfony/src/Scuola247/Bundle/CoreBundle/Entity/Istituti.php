<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Istituti
 *
 * @ORM\Table(name="istituti")
 * @ORM\Entity
 */
class Istituti
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=false)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="codicemeccanografico", type="string", length=160, nullable=false)
     */
    private $codicemeccanografico;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="istituti_istituto_seq", allocationSize=1, initialValue=1)
     */
    private $id;


}
