# Test Technique - Gestion des Réservations Hôtelières

## 🏨 Contexte
Notre client est un hôtel indépendant qui gère encore ses réservations sur papier. Ils nous ont mandatés pour créer la première brique de leur futur CRM.

L'application est techniquement initialisée (Laravel 11, Vue.js 3, Bootstrap 5), mais elle est vide.

## 🎯 Votre Mission
L'hôtelier a besoin d'une interface simple pour gérer les **séjours (Stays)** de ses clients.
Vous avez carte blanche sur l'implémentation technique, tant que la stack actuelle est respectée et que le résultat est fonctionnel et robuste.

### Besoin Fonctionnel 1 : La saisie d'une réservation
L'hôtelier doit pouvoir cliquer sur un bouton "Nouveau Séjour" depuis l'accueil pour accéder à un formulaire de création.

**Données à enregistrer pour un séjour :**
* Nom du client principal.
* Numéro de chambre.
* Date d'arrivée.
* Date de départ.
* Prix total du séjour (en euros).
* Statut (par défaut : "En attente").

**Règles de gestion :**
* Il est impératif que les dates soient cohérentes (on ne peut pas partir avant d'être arrivé).
* Le prix doit être positif.
* Une fois la réservation validée, l'hôtelier doit être redirigé vers la liste principale avec une confirmation visuelle.

### Besoin Fonctionnel 2 : Le planning des réservations
Sur la page d'accueil, l'hôtelier souhaite consulter l'historique des séjours sous forme de liste.

**Critères d'affichage :**
* Il veut pouvoir trier la liste par **Prix** ou par **Date d'arrivée** pour s'y retrouver.
* Comme il y aura beaucoup de réservations, l'affichage ne doit présenter que **5 séjours par page** pour ne pas surcharger l'écran.

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

1.  Installez les dépendances PHP via un conteneur temporaire (nécessaire car le dossier `vendor` est absent) :
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
    *L'application sera accessible sur `http://localhost` (ou le port défini par Sail).*

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
