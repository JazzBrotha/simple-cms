# simple-cms

## Arbetsmetod

## Mapp och filstruktur
Grundstruktur. Kan komma att ändras under arbetets gång.
* `app` - Huvudinnehåll
  - `resources` - Stödfiler
    - `error.php` - Errorhantering i utvecklingssyfte
    - `pdo.php` - Uppkoppling till databasen
    - `password.php` - Lösenord för anslutning till databasen. OBS! Ska endast ligga lokalt
  - `validation` - Validation för användare
    - `new_user.php` - Postar en användare till databasen baserad på klassen `User`
    - `validate_login.php` - Validarar inloggningen av en användare
  - `views` - Allt visuellt
    - `page`
      - `show.php` - Visningssida för varje post
    - `public` - Visning för besökare
      - `login.php` - Loginformulär för existerande användare
      - `register.php` - Formulär för att skapa en ny användare
    - `templates` - Mallar som används på många sidor
      - `footer.php` - Footer
      - `header.php` - Header
    - `user` - Visning för användare inloggad
      - `add.php` - Lägga till en post
      - `edit.php` - Ändra en post
      - `list.php` - Översikt över sina individuella posts
    - `home.php` - Visning av appens landingssida
  - `classes.php` - Klasser för att skapa posts och användare
  - `functions.php` - Hjälpfunktioner som exempelvis lösenordshashing
  - `start.php` - Länkar ihop allt i `app` och sätter rootmappar för projektet
* `assets` - Icke-php innehåll
  - `js`
  - `css`
* `public` - All funktionalitet för sidor som alla ser (Se `public` under `views` för mer info)
  - `login.php`
  - `register.php`
* `user` - All funktionalitet för sidor som bara användare ser (Se `user` under `views` för mer info)
  - `add.php`
  - `edit.php`
  - `list.php`
* `index.php` - Funktionalitet för appaens landningssida
* `page.php` - Funktionalitet för varje post

## Upplägg & struktur

Anteckningar från 27/4

### idé

Slutprodukten är tänkt att bli en blogg om Front end / webbutveckling där vi i gruppen kan posta tips o tricks inom vårt område, intressanta artiklar vi läst etc. Ambitionen är att lägga upp sidan live så att den kan bli en del av våra portfolios.

### Sidor / flödesschema

[Wireframe här](https://drive.google.com/file/d/0B-YWuZQGy3G2VXpyRkZTQmRhbzg/view?usp=sharing)

### Databas

Setup för att köra localhost + db i molnet: [logga in](https://www.heliohost.org) och välj 'remote mySQL' i panelen. Lägg till din publika IP till listan. I panelen finns också phpMyAdmin mm.

host: [johnny.heliohost.org](johnny.heliohost.org)
db: phpgrupp_cms
user: phpgrupp
pass: se slack

```php
$pdo = new PDO(
    "mysql:host=johnny.heliohost.org;dbname=phpgrupp_cms;charset=utf8",
    "phpgrupp",
    "xxxxxxxx"
    );
```

#### tabeller

Ligger i databasen

##### users

* _user\_id_ -- `INT, PRIMARY, A_I`
* _username_ -- `VARCHAR, LENGTH 30, UNIQUE`
* _password_ -- `VARCHAR, LENGTH 260`
* _firstname_ -- `VARCHAR, LENGTH 30`
* _lastname_ -- `VARCHAR, LENGTH 30`
* _email_ -- `VARCHAR, UNIQUE, LENGTH 50`
* _description_ -- `TEXT ("om mig", typ)`
* _profession_ -- `VARCHAR, LENGTH 50` (ex "Front end student")
* _picture_ -- `VARCHAR, LENGTH 260` (länk/hash om vi får det att funka....)
* _created_ -- `TIMIESTAMP, CURRENT_TIMESTAMP`
* _is\_admin_ -- `BOOLEAN`

##### posts

* _post\_id_ -- `INT, PRIMARY, A_I`
* _user\_id_ -- `INT`, foreign key --> users (`ON DELETE RESTRICT RESTRICT, ON UPDATE CASCADE`) *
* _title_ -- `VARCHAR, LENGTH 26` (rubrik)
* _summary_ -- `TEXT` (ingress/pufftext)
* _body_ -- `TEXT` (brödtext)
* _tags_ -- `VARCHAR, LENGTH 260` (taggar, separerade av komma)
* _date_ -- `TIMESTAMP, CURRENT_TIMESTAMP`

##### likes

* _post\_id_ -- `INT`, foreign key --> posts (`ON DELETE RESTRICT , ON UPDATE CASCADE`) *
* _user\_id_ -- `INT`, foreign key --> users (`ON DELETE RESTRICT, ON UPDATE CASCADE`) *

\* bestämmer vad som händer om vi försöker ta bort/ändra id på en användare/post som är länkad i en annan tabell. Vi får kolla vilken option som är bäst, Kan ändras under 'relation view'.

### Klasser

* `User` --> `functions`: posta inlägg, like:a, redigera sin profil, ta bort sitt konto...
  * `Contributor extends User`
  * `Admin extends User`

* `Post` --> `new Post(header, summary, body etc...)`

## Bibliotek

* [Bootstrap 4 alpha](https://v4-alpha.getbootstrap.com/)
* [TinyMCE](https://www.tinymce.com/docs/)

## Länkar

* [Instruktioner](https://github.com/FEND16/cms-php-mysql/blob/master/group_assignment_simple_cms.md)
* [Trello](https://trello.com/b/tEPopVij/php-gruppuppgift)
* [PHP Dokumentation](http://php.net/docs.php)
* [molnserver](https://www.heliohost.org)
* mejl: phpgruppuppgift@gmail.com

## Bra-att-ha-resurser

* [CMS video tutorial](https://www.youtube.com/watch?v=UbsAdx58ch0&list=PLfdtiltiRHWF0O8kS5D_3-nTzsFiPMOfM)
* [PHP creating a blog](https://thenewboston.com/videos.php?cat=74&video=19652)
