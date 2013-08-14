<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classi
 *
 * @ORM\Table(name="classi")
 * @ORM\Entity
 */
class Classi
{
    /**
     * @var string
     *
     * @ORM\Column(name="sezione", type="string", length=5, nullable=true)
     */
    private $sezione;

    /**
     * @var integer
     *
     * @ORM\Column(name="annodicorso", type="integer", nullable=false)
     */
    private $annodicorso;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=160, nullable=false)
     */
    private $descrizione;

    /**
     * @var integer
     *
     * @ORM\Column(name="classe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="classi_classe_seq", allocationSize=1, initialValue=1)
     */
    private $classe;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Indirizziscolastici
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Indirizziscolastici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="indirizzoscolastico", referencedColumnName="indirizzoscolastico")
     * })
     */
    private $indirizzoscolastico;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Anniscolastici
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Anniscolastici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="annoscolastico", referencedColumnName="annoscolastico")
     * })
     */
    private $annoscolastico;


}
