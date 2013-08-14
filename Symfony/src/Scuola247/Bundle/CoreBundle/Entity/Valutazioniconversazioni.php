<?php

namespace Scuola247\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Valutazioniconversazioni
 *
 * @ORM\Table(name="valutazioniconversazioni")
 * @ORM\Entity
 */
class Valutazioniconversazioni
{
    /**
     * @var integer
     *
     * @ORM\Column(name="valutazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $valutazione;

    /**
     * @var integer
     *
     * @ORM\Column(name="conversazione", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $conversazione;


}
