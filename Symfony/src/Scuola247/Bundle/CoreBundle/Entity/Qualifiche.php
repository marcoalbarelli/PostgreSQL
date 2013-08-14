<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qualifiche
 *
 * @ORM\Table(name="qualifiche")
 * @ORM\Entity
 */
class Qualifiche
{
    /**
     * @var integer
     *
     * @ORM\Column(name="annodicorso", type="integer", nullable=true)
     */
    private $annodicorso;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=160, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=4000, nullable=false)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", nullable=false)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="qualifiche_qualifica_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Metriche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Metriche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="metrica",  referencedColumnName="id")
     * })
     */
    private $metrica;

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
     * @var \Scuola247\Bundle\CoreBundle\Entity\Istituti
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Istituti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="istituto",  referencedColumnName="id")
     * })
     */
    private $istituto;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Indirizziscolastici
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Indirizziscolastici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="indirizzoscolastico",  referencedColumnName="id")
     * })
     */
    private $indirizzoscolastico;


}
