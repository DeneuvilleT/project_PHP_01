Windows PowerShell
Copyright (C) Microsoft Corporation. Tous droits réservés.

Installez la dernière version de PowerShell pour de nouvelles fonctionnalités et améliorations ! https://aka.ms/PSWindows

PS C:\Users\Thomas> symfony new **nom_du_projet**
<!-- Permet de créer un nouveau projet symfony -->

PS C:\Users\Thomas\helloworld> symfony serve
<!-- Lance le serveur -->

PS C:\Users\Thomas\helloworld> symfony server:stop
<!-- Stop le serveur -->

PS C:\Users\Thomas> symfony local:php:list
<!-- Affiche la liste des versions de PHP installées -->

PS C:\Users\Thomas\helloworld> php bin/console
<!-- Affiche les options de php -->

PS C:\Users\Thomas\helloworld> php bin/console debug:router
<!-- Pour afficher toutes les routes -->
 ---------------- -------- -------- ------ --------------------------
  Name             Method   Scheme   Host   Path
 ---------------- -------- -------- ------ --------------------------
  _preview_error   ANY      ANY      ANY    /_error/{code}.{_format}
  hello_main       ANY      ANY      ANY    /hello/
  hello_number     ANY      ANY      ANY    /hello/{number}
  hello_string     ANY      ANY      ANY    /hello/{string}
 ---------------- -------- -------- ------ --------------------------

PS C:\Users\Thomas\helloworld> composer require twig
<!-- Pour les templates -->

PS C:\Users\Thomas\helloworld> composer require --dev symfony/profiler-pack
<!-- Pour la barre d'état -->

PS C:\Users\Thomas> php bin/console make:entity
<!-- Créer une entité PHP -->


PS C:\Users\Thomas\helloworld> php bin/console doctrine:database:create
<!-- Créer la BDD -->
PS C:\Users\Thomas\helloworld> php bin/console make:migration
<!-- Créer la BDD -->
PS C:\Users\Thomas\helloworld> php bin/console doctrine:migration:migrate
<!-- Créer la BDD -->