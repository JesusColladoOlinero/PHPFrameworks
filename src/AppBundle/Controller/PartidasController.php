<?php
/**
 * Created by PhpStorm.
 * User: 4rEs
 * Date: 19/02/2018
 * Time: 19:55
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Partida;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PartidasController extends Controller
{
    /**
     * Obtiene todas la partidas
     *
     * @Route("/partidas", name="partidas")
     */
    public function getPartidasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partidas = $em->getRepository('AppBundle\Entity\Partida')
            ->getAllPartidas();

        if(empty($partidas)) {
            echo("<script>console.log('PHP: array vacio');</script>");
        }

        return $this->render('partidas/partidas.html.twig', [
            'partidas' => $partidas,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Crea una nueva partida a partir de un formulario
     *
     * @Route("/nueva-partida", name="nueva-partida")
     */
    public function nuevaPartidaAction(Request $request)
    {
        $partida = new Partida();

        $form = $this->createFormBuilder($partida)
            ->add('nombre', TextType::class, ['required' => true])
            ->add('save', SubmitType::class, array('label' => 'Crear Partida'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // obtenemos los datos del formulario
            $partida = $form->getData();

            // marcamos la partida como en juego
            $partida->setEstado(1);

            // generamos la combinación secreta
            $partida->setCombinacion($this->GetCombinacion());

            $dt = date_create(date('Y-m-d H:i:s'));
            // Obtenemos la fecha de acción
            $partida->setFechaAccion($dt);

            // Guardamos la entidad partida
            $em = $this->getDoctrine()->getManager();
            $em->persist($partida);
            $em->flush();

            // redirigimos al listado de partidas
            return $this->redirectToRoute('jugadas', array('id' => $partida->getId()));
        }

        return $this->render('partidas/nueva.html.twig', array(
            'form' => $form->createView(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ));
    }

    // Genera la combinación secreta de 6 colores a partir de 10 disponibles y sin repetirse.
    private function GetCombinacion() {
        $array = array("rojo", "naranja", "amarillo", "verde", "azul", "lila", "rosa", "gris", "negro", "blanco");
        $keys = array_keys($array);
        $new = "";

        shuffle($keys);

        $i = 0;

        foreach($keys as $key) {
            if ($i == 6)
                break;

            if ($new == ""){
                $new = $array[$key];
            }
            else{
                $new = $new .",". $array[$key];
            }

            $i = $i + 1;
        }

        return $new;
    }

}