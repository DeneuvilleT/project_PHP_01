<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
   #[Route(
      '/',
      name: 'home_main',
      methods: ["GET"],
   )]
   public function main(): Response
   {

      $tab = [
         "ben" => "56",
         "tom" => "23",
         "alex" => "45",
         "phil" => "67",
         "joe" => "87",
         "bill" => "34",
         "jean" => "50",
      ];

      return $this->render(
         "home/main.html.twig",
         [
            "myArray" => $tab,
         ]
      );
   }
}
