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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class JugadaController extends Controller
{
    /**
     * @Route("/jugadas/{id}", name="jugadas")
     */
    public function getJugadasAction($id, Request $request)
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

        // Montamos el formulario para guardar las jugadas
        $jugada = new Jugada();

        $form = $this->CrearFormJugada($jugada);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
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
            return $this->redirectToRoute('partidas');
        }

        return $this->render('partidas/jugadas.html.twig', [
            'jugadas' => $jugadas,
            'partida' => $partida,
            'form' => $form->createView(),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    private function CrearFormJugada($jugada)
    {
        return $this->createFormBuilder($jugada)
            ->add
            (
                'color1',
                ChoiceType::class,
                [
                    'required' => true,
                    'choices'  =>
                        [
                            'Rojo' => 'rojo',
                            'Azul' => 'azul',
                            'Amarillo' => 'amarillo',
                            'Verde' => 'verde',
                            'Negro' => 'negro',
                            'Blanco' => 'blanco',
                        ]
                ]
            )
            ->add
            (
                'color2',
                ChoiceType::class,
                [
                    'required' => true,
                    'choices'  =>
                        [
                            'Rojo' => 'rojo',
                            'Azul' => 'azul',
                            'Amarillo' => 'amarillo',
                            'Verde' => 'verde',
                            'Negro' => 'negro',
                            'Blanco' => 'blanco',
                        ]
                ]
            )
            ->add
            (
                'color3',
                ChoiceType::class,
                [
                    'required' => true,
                    'choices'  =>
                        [
                            'Rojo' => 'rojo',
                            'Azul' => 'azul',
                            'Amarillo' => 'amarillo',
                            'Verde' => 'verde',
                            'Negro' => 'negro',
                            'Blanco' => 'blanco',
                        ]
                ]
            )
            ->add
            (
                'color4',
                ChoiceType::class,
                [
                    'required' => true,
                    'choices'  =>
                        [
                            'Rojo' => 'rojo',
                            'Azul' => 'azul',
                            'Amarillo' => 'amarillo',
                            'Verde' => 'verde',
                            'Negro' => 'negro',
                            'Blanco' => 'blanco',
                        ]
                ]
            )
            ->add('save', SubmitType::class, [ 'label' => 'Hacer Jugada!!!' ])
            ->getForm();
    }
}