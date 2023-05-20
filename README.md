# Business Logic:

We have football teams. Each team has a name, country, money balance and players.
Each player has name and surname.
Teams can sell/buy players.

What we need in our app:
- Make a page (with pagination) displaying all teams and their players.
- Make a page where we can add a new team and its players.
- Make a page where we can sell/buy a player for a certain amount between two teams.

### Prerequisites

What is required to start the project

- Install Wamp 3.3.0 or Xampp or Lamp or Mamp (32bit or 64bit)
- Launch your server
- Hard disk: HDD or DSS of 250 GB minimum
- RAM: at least 8 GB
- CPU: Intel(R) Core(TM) i5-8250U CPU @ 1.60GHz 1.80 GHz minimum

### Installation

1)Go to the www folder of wamp previously installed
2) Then issue command : *git clone https://github.com/Yvon-Yves-OVONO-BENG/football.git* to download the project
3) Open the project with the command prompt
4) Launch the command *composer install* or *composer update*
5) Then create the database with the command: *symfony console doctrine:database:create* or *php bin/console doctrine:database:create*
6) Then import the *football.sql* file

## Démarrage

7) Launch your favorite browser
8) Then enter the URL http://localhost/football/public
9) Validate
10) Click on the red Login button

## To start

Administrator account
- Username : admin
- Password : 123456

## What can you do ?
- You can add teams with players by clicking on the *Add* submenu of *Team*
- You can display teams with players by clicking on the *Display* submenu of *Team*
- You can manage a player's purchase by clicking on the *Buy* submenu of *Sell/Buy*
- You can display the purchases made by clicking on the *Display sell* sub-menu of *Sell/Buy*

## Made with

- Symfony 6.2.10
- Mysql 8.0.31
- php 8.2.0
- HTML5 + CSS3
- Bootstrap 5
- JavaScript

## Versions
**Last version stable :** 0.0

## Autor

* **OVONO BENG Yvon Yves Noël** _alias_ [@ovono]([https://github.com/outout14](https://github.com/Yvon-Yves-OVONO-BENG/football)

## License
