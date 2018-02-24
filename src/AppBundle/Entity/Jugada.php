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
     * @ORM\Column(name="Color1", type="string", length=50)
     */
    private $color1;

    /**
     * @var string
     *
     * @ORM\Column(name="Color2", type="string", length=50)
     */
    private $color2;

    /**
     * @var string
     *
     * @ORM\Column(name="Color3", type="string", length=50)
     */
    private $color3;

    /**
     * @var string
     *
     * @ORM\Column(name="Color4", type="string", length=50)
     */
    private $color4;

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
     * Set color1
     *
     * @param string $color1
     *
     * @return Jugada
     */
    public function setColor1($color1)
    {
        $this->color1 = $color1;

        return $this;
    }

    /**
     * Get color1
     *
     * @return string
     */
    public function getColor1()
    {
        return $this->color1;
    }

    /**
     * Set color2
     *
     * @param string $color2
     *
     * @return Jugada
     */
    public function setColor2($color2)
    {
        $this->color2 = $color2;

        return $this;
    }

    /**
     * Get color2
     *
     * @return string
     */
    public function getColor2()
    {
        return $this->color2;
    }

    /**
     * Set color3
     *
     * @param string $color3
     *
     * @return Jugada
     */
    public function setColor3($color3)
    {
        $this->color3 = $color3;

        return $this;
    }

    /**
     * Get color3
     *
     * @return string
     */
    public function getColor3()
    {
        return $this->color3;
    }

    /**
     * Set color4
     *
     * @param string $color4
     *
     * @return Jugada
     */
    public function setColor4($color4)
    {
        $this->color4 = $color4;

        return $this;
    }

    /**
     * Get color4
     *
     * @return string
     */
    public function getColor4()
    {
        return $this->color4;
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

