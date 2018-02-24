<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jugada
 *
 * @ORM\Table(name="jugada")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JugadaRepository")
 */
class Jugada
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="Partida", inversedBy="idPartida")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="IdPartida", type="integer")
     */
    private $idPartida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaAccion", type="datetime")
     */
    private $fechaAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="Propuesta", type="string", length=255)
     */
    private $propuesta;

    /**
     * @var string
     *
     * @ORM\Column(name="Resultado", type="string", length=255)
     */
    private $resultado;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPartida
     *
     * @param integer $idPartida
     *
     * @return Jugada
     */
    public function setIdPartida($idPartida)
    {
        $this->idPartida = $idPartida;

        return $this;
    }

    /**
     * Get idPartida
     *
     * @return int
     */
    public function getIdPartida()
    {
        return $this->idPartida;
    }

    /**
     * Set fechaAccion
     *
     * @param \DateTime $fechaAccion
     *
     * @return Jugada
     */
    public function setFechaAccion($fechaAccion)
    {
        $this->fechaAccion = $fechaAccion;

        return $this;
    }

    /**
     * Get fechaAccion
     *
     * @return \DateTime
     */
    public function getFechaAccion()
    {
        return $this->fechaAccion;
    }

    /**
     * Set propuesta
     *
     * @param string $propuesta
     *
     * @return Jugada
     */
    public function setPropuesta($propuesta)
    {
        $this->propuesta = $propuesta;

        return $this;
    }

    /**
     * Get propuesta
     *
     * @return string
     */
    public function getPropuesta()
    {
        return $this->propuesta;
    }

    /**
     * Set resultado
     *
     * @param string $resultado
     *
     * @return Jugada
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return string
     */
    public function getResultado()
    {
        return $this->resultado;
    }
}

