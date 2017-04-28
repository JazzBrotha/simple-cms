# simple-cms

## Länkar

* [Instruktioner](https://github.com/FEND16/cms-php-mysql/blob/master/group_assignment_simple_cms.md)
* [Trello](https://trello.com/b/tEPopVij/php-gruppuppgift)
* [PHP Dokumentation](http://php.net/docs.php)
* ~~[Molnserver](https://www.000webhost.com/)~~ [molnserver](https://www.heliohost.org)

----

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

----

## Bra-att-ha-resurser

* [CMS video tutorial](https://www.youtube.com/watch?v=UbsAdx58ch0&list=PLfdtiltiRHWF0O8kS5D_3-nTzsFiPMOfM)
* [PHP creating a blog](https://thenewboston.com/videos.php?cat=74&video=19652)