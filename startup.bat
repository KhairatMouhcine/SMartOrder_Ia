@echo off
REM Activer l'environnement virtuel
call scripts\venv\Scripts\activate.bat

REM Lancer les scripts Python en arrière-plan
start python scripts\serveur.py
start python scripts\ServeurYoussef.py

REM Lancer le serveur Laravel
php artisan serve