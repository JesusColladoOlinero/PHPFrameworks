<?php
/**
 * Created by PhpStorm.
 * User: 4rEs
 * Date: 23/02/2018
 * Time: 18:28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Jugada;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class JugadaController extends Controller
{
    /**
     * @Route("/jugadas/{id}", name="jugadas")
     */
    public function getJugadasAction($id)
    {
        $em = $this->getDoctrine()->getManager();

//        $partida = $em->getRepository('AppBundle\Entity\Partida')
//            ->findOneBy(['id' => $id]);
        $partida = $em->getRepository('AppBundle\Entity\Partida')
            ->getDatosPartida($id);

        $jugadas = $em->getRepository('AppBundle\Entity\Jugada')
            ->getJugadas($id);

        if(empty($jugadas)) {
            echo("<script>console.log('PHP: array vacio');</script>");
        }

        return $this->render('partidas/jugadas.html.twig', [
            'jugadas' => $jugadas,
            'partida' => $partida,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}