# Test Technique - Gestion des Réservations Hôtelières

## 🏨 Contexte
Notre client est un hôtel indépendant qui gère encore ses réservations sur papier. Ils nous ont mandatés pour créer la première brique de leur futur CRM.

L'application est techniquement initialisée (Laravel 11, Vue.js 3, Bootstrap 5), mais elle est vide.

## 🎯 Votre Mission
L'hôtelier a besoin d'une interface simple pour gérer les **séjours (Stay)** de et ses **clients (Customer)**.

Vous avez carte blanche sur l'implémentation technique, tant que la stack actuelle est respectée et que le résultat est fonctionnel et robuste.

Vous devez respecter les besoins fonctionnels suivants, en prenant en compte les performances et la sécurité de l'application. 

Vous pouvez également proposer des améliorations et d'autres petites fonctionnalités pour améliorer l'expérience utilisateur.

### Besoin Fonctionnel 1 : Saisie de réservation
L'hôtelier doit pouvoir cliquer sur un bouton "Nouveau Séjour" depuis l'accueil pour accéder à un formulaire de création.

**Données à enregistrer pour un séjour :**
* Email du client
* Nom du client
* Prénom du client
* Numéro de chambre
* Date d'arrivée
* Date de départ
* Prix total du séjour (en euros)
* Statut (_En attente_, _Validé_, _Annulé_)

**Règles de gestion :**
* Il est impératif que les dates soient cohérentes : on ne peut pas partir avant d'être arrivé
* Le prix doit être positif
* Une fois la réservation validée, l'hôtelier doit être redirigé vers la liste principale avec une confirmation visuelle

### Besoin Fonctionnel 2 : Liste des réservations
Sur la page d'accueil, l'hôtelier souhaite consulter l'historique des séjours sous forme de liste.

**Fonctionnalités attendues :**
* Il veut pouvoir trier la liste par _Prix_ ou par _Date d'arrivée_ pour s'y retrouver (triée par défaut par _Date d'arrivée_ descendant)
* L'affichage ne doit présenter que **5 séjours par page** pour ne pas surcharger l'écran et optimiser les performances
* Chaque séjour doit proposer les **actions** suivantes :
    * **Modifier la réservation**
    * **Supprimer la réservation**
    * **Voir la fiche client**

### Besoin Fonctionnel 3 : Liste des clients
L'hôtelier souhaite avoir une page pour afficher la liste de tous ses clients.

**Fonctionnalités attendues :**
* La liste est triée par _Email_ par défaut
* Afficher les données suivantes _Email_, _Nom_, _Prénom_, _Date du dernier séjour_
* L'affichage ne doit présenter que **5 clients par page** pour ne pas surcharger l'écran et optimiser les performances
* Chaque ligne doit proposer un bouton pour **Voir la fiche client**

### Besoin Fonctionnel 4 : Fiche client
L'hôtelier souhaite avoir une page pour afficher les détails d'un client.

**Fonctionnalités attendues :**
* Affichage des informations du client : _Email_, _Nom_, _Prénom_, _Date du dernier séjour_, _Nombre total de séjours_ et _Total dépensé_
* Un bouton pour **Modifier le client** (_Nom_ et _Prénom_)
* Un bouton pour **Supprimer le client** avec une confirmation : _Êtes-vous sûr de vouloir supprimer ce client, ainsi que toutes ses réservations ?_
* La liste de tous ses séjours (triée par défaut par _Date d'arrivée_ descendant)
* Chaque séjour doit proposer les **actions** suivantes :
    * **Modifier la réservation**
    * **Supprimer la réservation**

---

## 🛠 Installation du projet

Choisissez l'une des deux méthodes ci-dessous selon votre environnement de préférence.

### Option A : Installation Classique (Recommandée si vous avez PHP/Node installés)
1.  Installez les dépendances :
    ```bash
    composer install
    npm install
    ```
2.  Configurez l'environnement :
    ```bash
    cp .env.example .env
    php artisan key:generate
    touch database/database.sqlite
    php artisan migrate
    ```
3.  Lancez le projet :
    * Terminal 1 : `npm run dev`
    * Terminal 2 : `php artisan serve`

### Option B : Installation via Docker (Laravel Sail)
*Si vous n'avez pas PHP/Composer installés localement, utilisez cette méthode.*

1.  Installez les dépendances PHP via un conteneur temporaire (nécessaire, car le dossier `vendor` est absent) :
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php83-composer:latest \
        composer install --ignore-platform-reqs
    ```
2.  Configurez l'environnement :
    ```bash
    cp .env.example .env
    ```
3.  Démarrez l'environnement :
    ```bash
    ./vendor/bin/sail up -d
    ```
4.  Finalisez l'installation :
    ```bash
    ./vendor/bin/sail artisan key:generate
    ./vendor/bin/sail artisan migrate
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev
    ```
*L'application sera accessible sur `http://localhost:8080`.*

**Si le port 8080 est déjà utilisé sur votre machine.**
1. Arrêtez le conteneur
    ```bash
    ./vendor/bin/sail down
    ```
2. Modifiez le fichier .env
    Ouvrez le fichier .env à la racine du projet et modifiez la valeur de `APP_PORT`
3. Relancez Sail
    ```bash
    ./vendor/bin/sail up -d
    ```

---

## 📦 Livraison du test

Une fois le développement terminé :

1.  Assurez-vous que l'application fonctionne (front et back).
2.  **Important :** Nous ne voulons pas récupérer les dossiers `vendor` et `node_modules`.

### Pour créer l'archive à nous renvoyer

**Si vous êtes sur Mac / Linux / Git Bash :**
Lancez cette commande à la racine du projet :
```bash
zip -r [votre-nom]-hotel-test.zip . -x "vendor/**" "node_modules/**" ".git/**" ".env"
```
**Si vous êtes sur Windows (sans terminal Bash)**
* Supprimez manuellement les dossiers vendor et node_modules
* Zippez le dossier du projet
* Renommez l'archive [votre-nom]-hotel-test.zip

## *Bon code !*
