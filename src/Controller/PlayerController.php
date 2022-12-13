<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Ticket;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/player")]
class PlayerController extends AbstractController
{

   public function __construct(private EntityManagerInterface $em)
   {
   }

   #[Route("/test", name: "player_test")]
   public function testEntity()
   {
      // $ticket = new Ticket();
      // $ticket->setAmount(15.5);
      // $ticket->setMagicNumber(47);
      // $player->addTicket($ticket);

      // dd($player, $ticket);


      $player = new Player();

      $player->setLastname("François");
      $player->setFirstname("René");
      $player->setBirthdate(date_create("1990-12-11 08:56:00"));
      $player->setMoney(20);

      $this->em->persist($player);

      $ticket = new Ticket();
      $ticket->setAmount(10.5);
      $ticket->setMagicNumber(42);
      $ticket->setPlayer($player);

      $ticket = new Ticket();
      $ticket->setAmount(15.5);
      $ticket->setMagicNumber(24);
      $ticket->setPlayer($player);

      // $ticket a besoin de de l'id de $player pour fonctionner
      // symfony le prépare avant de créer $ticket, l'ordre uimpote peu
      $this->em->persist($ticket);

      // Enoie à la BDD / Transaction
      $this->em->flush();

      return $this->render(
         "player/test.html.twig",
         [
            "player" => $player,
         ]
      );
   }

   #[Route("/", name: 'player_show_all')]
   public function showAll()
   {

   }
}
