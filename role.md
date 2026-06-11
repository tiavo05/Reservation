📘 Guide de présentation de l’application
📌 AppReservation – Système de gestion de rendez-vous
1. 🎯 Objectif de l’application

AppReservation est une application web développée avec Laravel permettant de :

📅 Créer des réservations (rendez-vous)
👤 Permettre aux utilisateurs de suivre leurs demandes
🛠️ Donner un espace d’administration pour gérer les réservations
🔔 Notifier les utilisateurs du statut de leurs demandes
2. 🧱 Technologies utilisées
*Backend : Laravel 10
*Frontend : Blade + TailwindCSS
*Base de données : MySQL
*Authentification : Laravel Breeze / Auth
*Notifications : Laravel Notifications (email prévu / SMS en extension)
*Outils : Vite, PHP 8.2
3. 👥 Rôles dans l’application
👤 Utilisateur
*S’inscrire / se connecter
*Créer une réservation
*Voir ses réservations
*Recevoir les notifications (accepté/refusé)
🛠️ Administrateur
*Voir toutes les réservations
*Accepter une réservation
*Refuser une réservation
*Notifier automatiquement l’utilisateur
4. ⚙️ Fonctionnalités déjà implémentées
✅ Authentification
*Inscription
*Connexion
*Gestion des rôles (admin / user)
📅 Gestion des réservations
Utilisateur :
Créer une réservation avec :
*Nom
*Email
*Téléphone
*Date
*Heure
*Motif
*Voir ses réservations
Administrateur :
Voir toutes les réservations
Changer le statut :
🟡 en_attente
🟢 accepte
🔴 refuse
🔔 Notifications (déjà en place côté logique)

Lorsqu’un admin :

*accepte une réservation → notification envoyée
*refuse une réservation → notification envoyée

📌 Les notifications apparaissent dans le dashboard utilisateur

📊 Dashboard
Utilisateur :
*Carte “Nouvelle réservation”
*Carte “Mes réservations”
*Statistiques :
*en attente
*acceptées
*refusées
*Notifications visibles
Admin :
*Accès à la liste complète des réservations
*Actions rapides (✔ / ✖)
5. 🖥️ Pages disponibles
🌐 Public
*Page d’accueil
*Login
*Register
🔐 Authentifié
*Dashboard utilisateur
*Création réservation
*Liste des réservations
🛠 Admin
*Dashboard admin
*Liste des réservations
*Acceptation / refus
6. 🔄 Workflow de l’application
Étape utilisateur :
*L’utilisateur crée une réservation
*Statut = en_attente
*Étape admin :
*L’admin consulte les demandes
*Il accepte ou refuse
*Étape système :
*Notification envoyée à l’utilisateur
*Mise à jour du dashboard utilisateur
7. 🧪 Fonctionnalités testables (démonstration)

A tester :

✔ Test 1 : création réservation
Login user
Créer réservation
Vérifier en base
✔ Test 2 : validation admin
Login admin
Accepter une réservation
Voir changement statut
✔ Test 3 : notifications
Retour user dashboard
Voir notification affichée
8. 📌 Ce qui fonctionne actuellement

✔ Authentification
✔ Gestion rôles
✔ CRUD réservation
✔ Dashboard user/admin
✔ Changement statut
✔ Notifications internes
✔ Interface responsive Tailwind

9. 🚧 Améliorations prévues
📧 Email automatique (SMTP)
📱 SMS notification (Twilio)
📊 Graphiques statistiques admin
📅 Calendrier interactif
🔍 Recherche et filtres
🌙 Dark mode