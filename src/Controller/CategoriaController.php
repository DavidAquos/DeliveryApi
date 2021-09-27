<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    // Con la anotacion Route establecemos el endpoint
    /**
     * @Route("/categoria/list" , name="categoria_list")
     */
    // Metodo asociado al endpoint, siempre tiene que devolver un response


    public function listCategorias(Request $request)
    {
        /*
        $response = new Response();
        $response->setContent('<div> Hola Mundo </div>');
        return $response;
        */

        // Antes de montar el json capturamos el contenido del request
        $categoria = $request-> get('categoria');
        $response = new JsonResponse();
        $response ->setData([
           'success' =>true,
           'data'=> [
               [
                   'id'=> 1,
                   'categoria'=> 'Japones'
               ],
               [
                   'id'=> 2,
                   'categoria'=> 'Italiana'
               ],
               [
                   'id'=> 3,
                   'categoria'=> $categoria
                   // http://127.0.0.1:8000/categoria/list?categoria=Español
               ],

           ]
        ]);

        $this->logger->info('List categorias matched!!!');
        return $response;
    }

}