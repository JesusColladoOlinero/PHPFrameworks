<?php
/**
 * Created by PhpStorm.
 * User: 4rEs
 * Date: 18/02/2018
 * Time: 12:35
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
    /**
     * @Route("/hello")
     */
    public function helloAction()
    {
        $em = $this->getDoctrine()->getManager();

        $estados = $em->getRepository('AppBundle:Estados')
            ->findAll();

//        if(is_null($estados)) {
//            echo("<script>console.log('PHP: array vacio');</script>");
//        }

//        echo("<script>console.log('PHP: ".print_r($estados)."');</script>");

        // return new Response($this->json($estados));

        // Consegir todo
//        foreach ($estados as $estado) {
//            echo $estado->getNombre();
//            echo "<br/>";
//            echo $estado->getId();
//            echo "<hr/>";
//        }
//
//        die();
        $seleccion = $this->GetCombinacion();

        echo $seleccion;

        return $this->render('hello/hello.html.twig', [
            'estados' => $estados,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


//    private function GetCombinacion(){
//        $colores = array("rojo", "azul", "amarillo", "verde", "negro", "blanco");
//        //echo "Array original";
//        var_export ($colores);
//        $seleccion = array_rand($colores, 4);
//
//        foreach ($seleccion as $estado) {
//            echo $colores[$estado];
//            echo "<br/>";
//        }
//    }

    function GetCombinacion() {
        $array = array("rojo", "azul", "amarillo", "verde", "negro", "blanco");
        $keys = array_keys($array);
        $new = "";

        shuffle($keys);

        $i = 0;

        foreach($keys as $key) {
            if ($i == 4)
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