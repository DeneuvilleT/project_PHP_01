<?php

namespace App\Controller;

use App\Entity\Player;
use App\Entity\Ticket;
use App\Form\PlayerFormType;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/player")]
class PlayerController extends AbstractController
{

   public function __construct(private EntityManagerInterface $em)
   {
   }

   #[Route(
      "/add",
      name: "add_test"
   )]
   public function addEntity()
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
         "player/addPlayer.html.twig",
         [
            "player" => $player,
         ]
      );
   }


   #[Route(
      "/",
      name: 'player_all'
   )]
   public function showAll()
   {
      $allPlayers = $this->em->getRepository(Player::class)->findAll();

      return $this->render(
         "player/showAll.html.twig",
         [
            "allPlayers" => $allPlayers
         ]
      );
   }

   #[Route(
      "/{id}",
      name: 'player_one',
      requirements: ['id' => "\d+"]
   )]
   public function showOne(int $id)
   {
      $repo =  $this->em->getRepository(Player::class);
      $player = $repo->find($id);

      return $this->render(
         "player/showOne.html.twig",
         [
            "player" => $player
         ]
      );
   }


   #[Route(
      "/new",
      name: 'player_new'
   )]
   public function create(Request $request)
   {

      $player = new Player();
      $form = $this->createForm(PlayerFormType::class, $player);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
         $player->setMoney(50);
         $this->em->persist($player);
         $this->em->flush();

         return $this->redirectToRoute("home_main");
      };

      return $this->render(
         "player/newPlayer.html.twig",
         [
            "playerForm" => $form->createView()
         ]
      );
   }


   #[Route(
      "/update/{id}",
      name: 'player_update',
      requirements: ['id' => "\d+"]
   )]
   public function update(Request $request, int $id)
   {
      /** @var PlayerRepository */

      $repo =  $this->em->getRepository(Player::class);
      $player = $repo->find($id);

      $form = $this->createForm(PlayerFormType::class, $player);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

         // Permet de Updtae et Create
         // $this->em->persist($player);
         // $this->em->flush();

         $repo->save($player, true);
         return $this->redirectToRoute("player_all");
      };

      return $this->render(
         "player/updatePlayer.html.twig",
         [
            "playerForm" => $form->createView()
         ]
      );
   }


   #[Route(
      "/remove/{id}",
      name: 'player_remove',
      requirements: ['id' => "\d+"]
   )]
   public function remove(Request $request, int $id)
   {
      /** @var PlayerRepository */

      $repo =  $this->em->getRepository(Player::class);
      $player = $repo->find($id);

      // Permet de Delete
      if ($player === null) {
         return $this->redirectToRoute("player_all");
      };

      $this->em->remove($player);
      $this->em->flush();

      
      return $this->redirectToRoute("player_all");
   }
}
