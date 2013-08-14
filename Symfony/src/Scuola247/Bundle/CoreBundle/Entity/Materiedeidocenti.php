<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiedeidocenti
 *
 * @ORM\Table(name="materiedeidocenti")
 * @ORM\Entity
 */
class Materiedeidocenti
{
    /**
     * @var integer
     *
     * @ORM\Column(name="materiadeldocente", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="materiedeidocenti_materiadeldocente_seq", allocationSize=1, initialValue=1)
     */
    private $materiadeldocente;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Personefisiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Personefisiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="docente",  referencedColumnName="id")
     * })
     */
    private $docente;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Materie
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Materie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="materia",  referencedColumnName="id")
     * })
     */
    private $materia;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Classi
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Classi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classe",  referencedColumnName="id")
     * })
     */
    private $classe;


}
