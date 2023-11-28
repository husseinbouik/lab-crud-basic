# lab-laravel-basic

Le projet "lab-laravel-basic" est une application web développée avec Laravel, axée sur la gestion des tâches. Il inclut des opérations CRUD (Create, Read, Update, Delete) pour les tâches, une pagination et une fonctionnalité de recherche dans le tableau.

## Travail à Faire

- **Implémentation de la Gestion des Tâches : ** Effectuez les opérations CRUD pour les tâches.
- **Mise en Place de la Pagination :** Mettez en œuvre la pagination pour améliorer l'expérience utilisateur lors du traitement d'un grand nombre de tâches.
- **Mise en Place de la Recherche dans le Tableau :** Permettez aux utilisateurs de rechercher et de filtrer dynamiquement les tâches dans le tableau en utilisant AJAX pour une expérience utilisateur fluide et réactive.

## Critères de Validation

1. **Opérations CRUD :** Assurez-vous que les opérations CRUD pour les tâches sont correctement implémentées.
2. **Pagination Fonctionnelle :** Vérifiez que la pagination améliore l'expérience utilisateur, notamment lors du traitement de nombreuses tâches.
3. **Fonctionnalité de Recherche :** Assurez-vous que la fonction de recherche dans le tableau fonctionne de manière dynamique et réactive avec l'utilisation d'AJAX.

## Démarrage

Pour commencer avec le projet, suivez ces étapes :

1. Clonez le dépôt : `git clone https://github.com/husseinbouik/lab-laravel-basic.git`
2. Installez les dépendances : `composer install`
3. Configurez votre fichier d'environnement : `cp .env.example .env`
4. Générez la clé d'application : `php artisan key:generate`
5. Configurez les paramètres de votre base de données dans le fichier `.env`.
6. Exécutez les migrations de la base de données : `php artisan migrate`
7. Lancez le serveur de développement : `php artisan serve`

Visitez l'application dans votre navigateur à `http://localhost:8000`.

## Utilisation

- Accédez à la fonctionnalité de gestion des tâches via l'interface web.
- Utilisez la pagination pour naviguer efficacement à travers la liste des tâches.
- Utilisez la fonctionnalité de recherche pour trouver des tâches spécifiques en fonction de critères.

## En savoir plus

Explorez la [documentation Laravel](https://laravel.com/docs) pour des informations approfondies sur Laravel et ses fonctionnalités.

## Références

Consultez la documentation officielle de Laravel pour en savoir plus sur les opérations mentionnées ci-dessus : [Documentation Laravel](https://laravel.com/docs).

 [Autoformation Laravel](https://grafikart.fr/formations/laravel).

Assurez-vous de bien comprendre les concepts de base de Laravel, tels que la gestion des routes, les migrations de base de données, la création de vues, et l'utilisation du modèle MVC (Modèle-Vue-Contrôleur). N'hésitez pas à explorer d'autres fonctionnalités de Laravel pour améliorer vos compétences en développement web.


