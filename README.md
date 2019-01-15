# Le ou La - Lumen PHP Framework
## Description
Le ou La WiFi ? Le ou La nems ?... Votez ce qui vous semble le plus juste. 

## Installation
```
# cloner le projet
> git clone ...

# chopper les dépendances
> composer install

# créer la BD (dans l'exemple leoula_db)

# remplir le .env selon .env.exemple

# init la base de donnée
> php artisan migrate
```

2 routes en place pour commencer
```
GET   /
GET   /{$mot}
```

## Détails
La base de donnée de mots est faite à partir du fichier text `/liste_francais.txt`.
> À surveiller: avec l'encode fait remplacé tout les ``<?>`` (caractère chelou) par `é`. Je sais pas si c'était une bonne idée 🤷

# Doc Rapide
 - Les Controller sont dans `/app/Http/Controllers` et extends tous de `Controller`.
 - Le routeur est `/routes/web.php`
 - Les views sont dans `/resources/views` et utilise le moteur Blade
 - La BD est faite avec des [migrations](https://laravel.com/docs/5.7/migrations) qui se trouve dans `/database/migrations`
 - Le css est dans le `/public/css`

Plus d'info dans la doc pour le framework [Lumen](https://lumen.laravel.com/docs) et [Laravel](https://laravel.com/docs/5.7/)

Présentation de l'architecture avec exemplte rapide [lien](https://www.codementor.io/seyiadeleke42/creating-your-first-artisan-command-in-lumen-5-5-cvi59gmgl)


---

## License MIT
[source](https://opensource.org/licenses/MIT).
