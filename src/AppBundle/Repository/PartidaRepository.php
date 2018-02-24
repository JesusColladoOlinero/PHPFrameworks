<?php

namespace AppBundle\Repository;

/**
 * PartidaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartidaRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Obtiene todas las partidas realizadas
     *
     * @return mixed
     */
    public function getAllPartidas()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p.id, p.nombre, p.combinacion, e.nombre as estado FROM AppBundle\Entity\Partida p JOIN AppBundle\Entity\Estados e 
WITH p.estado =
 e.id')
            ->getResult();
    }

    public function getDatosPartida($id)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p.id, p.nombre, p.combinacion, e.nombre as estado FROM AppBundle\Entity\Partida p JOIN AppBundle\Entity\Estados e 
WITH p.estado = e.id WHERE p.id = :idPartida')
            ->setParameter('idPartida', $id)
            ->getSingleResult();
    }
}
