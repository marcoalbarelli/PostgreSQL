<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personegiuridiche
 *
 * @ORM\Table(name="personegiuridiche")
 * @ORM\Entity
 */
class Personegiuridiche
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="personafisiche_personagiuridica_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="partitaiva", type="string", length=11, nullable=true)
     */
    private $partitaiva;

    /**
     * @var string
     *
     * @ORM\Column(name="codicefiscale", type="string", length=16, nullable=true)
     */
    private $codicefiscale;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Soggetti
     *
     * @ORM\OneToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Soggetti")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="personagiuridica",  referencedColumnName="id", unique=true)
     * })
     */
    private $personagiuridica;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Tipipersonegiuridiche
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Tipipersonegiuridiche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipopersonagiuridica",  referencedColumnName="id")
     * })
     */
    private $tipopersonagiuridica;

    /**
     * @var \Scuola247\Bundle\CoreBundle\Entity\Nazioni
     *
     * @ORM\ManyToOne(targetEntity="Scuola247\Bundle\CoreBundle\Entity\Nazioni")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nazione",  referencedColumnName="id")
     * })
     */
    private $nazione;


}
