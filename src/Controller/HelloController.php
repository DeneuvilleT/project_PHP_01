<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hello')]
class HelloController extends AbstractController
{
   #[Route(
      '/',
      name: 'hello_main',
      methods:["GET"],
   )]
   public function main(): Response
   {
      $rand = rand(0, 1024);
      $toto = 'test';
      return $this->render(
         'hello/main.html.twig',
         [
            'rand' => $rand,
            // 'toto' => $toto,
            // Test pour le IF de main.html.twig
         ]
      );
   }


   /** Avec le REGEX la valeur doit être un nombre */

   /** Il existe aussi cette syntaxe #[Route('/{number<\d+>}', name:'hello_number')] */ 
   #[Route(
      '/{number}',
      name: 'hello_number',
      requirements: [
         "number" => '\d+',
      ],
      methods: ["GET"],
   )]
   public function getNumber(int $number): Response
   {
      return $this->render(
         'hello/number.html.twig',
         [
            'number' => $number,
         ]
      );
   }


   #[Route(
      '/{string}',
      name: 'hello_string',
      methods: ["GET"],
   )]
   public function getString(string $string): Response
   {
      return $this->render(
         'hello/string.html.twig',
         [
            'string' => $string,
         ]
      );
   }
}
