<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hello')]
class HelloController extends AbstractController
{
   #[Route('/', name:'hello_main')]
   public function main():Response
   {
      $rand = rand(0,1024);
      die("coucou, $rand");
      // return new Response(content: "coucou");
   }

   #[Route('/{number}', name:'hello_number', requirements: ["number"=> '\d+'])]
   // Avec le REGEX la valeur doit être un nombre
   public function getNumber(int $number):Response
   // Typé si voulu
   {
      die("coucou, $number");
      // return new Response(content: "coucou, $number");
   }

   #[Route('/{string}', name:'hello_string')]
   public function getString(string $string):Response
   // Typé si voulu
   {
      die("coucou, $string");
      // return new Response(content: "coucou, $number");
   }
}
