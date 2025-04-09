# Site web dynamique en utilisant le cadriciel Laravel

Projet réalisé dans le cadre de cours Cadriciel (Session 4)

## Contexte du travail pratique 1

Ce mandat implique la création d'un site Internet visant à collecter des informations auprès des
étudiants du Collège Maisonneuve. De plus, il est envisagé de développer un réseau social pour
les étudiants à l'avenir.
La première étape consiste à collecter les informations nécessaires, à remplir la base de
données avec des données aléatoires, et à créer des interfaces fonctionnelles permettant de
visualiser, saisir, mettre à jour et supprimer les informations des étudiants.
La base de données initiale comprendra deux tables : "Étudiant" (id, nom, adresse, téléphone,
email, date de naissance, ville_id) et "Ville" (id, nom).

## Contexte du travail pratique 2

À partir du travail pratique 1, apporter les améliorations demandées au projet.

Félicitations, votre client a apprécié votre premier projet et aimerait vous offrir un
deuxième mandat pour améliorer le réseau social du collège.

- Le client souhaite maintenant ajouter une page de connexion pour que chaque
élève puisse se connecter à son propre compte, la table étudiante doit donc être
connectée à la table utilisateur (users). Pour maintenir la sécurité du système, le
mot de passe doit être crypté
- Étant donné que les étudiants du collégial sont polyglottes, le client vous a
demandé de créer un système multilingue, français en anglais. Tout le contenu du
système doit être dans les deux langues

Pour compléter le système et le mettre en production, le client a demandé 2 autres
modifications majeures
- Un forum
    - Le système doit avoir un forum dans lequel les étudiants peuvent écrire des
articles. Les articles doivent être visibles par tous les étudiants connectés. Seul
l'étudiant qui a écrit l'article peut le modifier et/ou le supprimer

- Un répertoire de documents
    - Pour compléter, le système doit disposer d'un répertoire de fichiers, dans lequel
les étudiants peuvent partager des documents au format pdf, zip et doc. Ce
répertoire doit être accessible par tous les étudiants connectés. Seul l'élève qui a
partagé le document peut le modifier et/ou le supprimer