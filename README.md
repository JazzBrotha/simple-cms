# simple-cms

## Arbetsmetod
Alla ändringar av README.md görs direkt i `master` på GitHub och inte lokalt eller i andra brancher.

### Versionshantering
En annan person i gruppen måste alltid godkänna innan något pushas in i `master`. På det sättet håller vi `master` så buggfri som möjligt. Commits skrivs helst på engelska. Vi arbetar enligt följande mönster:
1. Skapa en ny `branch` varje gång du ska arbeta på en ändring i appen. Enklast är att namnge branchen så den indikerar vilken ändring du arbetar på. Ex, om du arbetar med footern döper du din nya branch till `footer`. Använd [A-Za-z] för namngivning av branches, alltså inga siffror, speciella tecken eller å,ä,ö.
2. Versionshantera lokalt på det sättet som passar dig bäst men det kan vara en säkerhetsåtgärd att göra commits med jämna mellanrum.
3. Lägga till alla filer till staging arean  via `git add *` och gör en ny commit `git commit -m "<commit message>"`.
4. Uppdatera din `master` branch genom `git pull origin master`. Om du vill slippa skriva en anledning till varför du gör en merge så skriver du istället `git pull origin master --no-edit`. Om inte det funkar kan du prova byta plats på `no-edit`: `git pull --no-edit origin master` 
5. Lös eventuella merge conflicts.
6. Pusha upp din nya branch till GitHub via `git push <branch name>`.
7. Gör en pull request från din nya branch intill `master`.

Mergea en pull request:
1. Meddela i Slack att du ska göra en review så det inte blir några kollisioner.
2. Öppna pull requesten och tryck på "Add your review". Läs igenom ändringarna.
3. Godkänn om det ser bra ut eller lämna kommentar om något behöver ändras.
4. Tryck på &#8964; på mergeknappen och välj "squash and merge" för att slå ihop alla commits till en.
5. Ta bort den gamla branchen

Tips: Om du inte vill göra en ny commit efter du gjort ändringar lokalt lägger du till `--amend --no-edit` efter kommandot, alltså `git commit --amend --no-edit`. Om du vill se dina senaste ändringar efter en `git pull`, exempelvis för att se eventuella merge conflicts tydligare, så kan du skriva `git diff`.

### Naming conventions & best practice
* Försök hålla liknande syntax som resten av dokumentet.
* Namnge funktioner med `snake_case` och variabler med `camelCase`. Klasser ska börja med stor bokstav, t.ex. `class User`.
* JavaScript ska hellst skrivas i ES6. Försök följa AirBnb:s [styleguide](https://github.com/airbnb/javascript).
* Försök använda Bootstraps färdiga CSS-klasser så mycket som möjligt. Namnge dina egna klasser likt Bootstrap gör. I övrigt försök följa AirBnb:s [styleguide](https://github.com/airbnb/css).

### Säkerhet
* Alla lösenord hashas.
* All user input som ska skrivas ut rensas på skadlig kod med funktionen `noScript()` i `functions.php` _innan lagring_, lämpligen i `User` eller `Post`-konstruktorn.
* All user input som _inte_ ska tolkas som HTML (t.ex post title) escape:as med `escape()` i `functions.php` på stället där den ska skrivas ut. ex `<h2><?php echo escape($page['title']); ?></h2>`

## Mapp och filstruktur
Grundstruktur. Kan komma att ändras under arbetets gång.
* `app` - Huvudinnehåll
  - `classes` - Klasser
    - `post.php` - Hanterar _en_ enskild post: Skapar ny m konstruktor + metoder för att lägga till samt uppdatera i databas
    - `posts.php` - Hanterar urval av poster: metoder för att hämta alla, hämta en etc.
    - `user.php` - Hanterar _en_ användare: skapar + lagrar i db.
  - `views` - Allt visuellt
    - `page`
      - `show.php` - Visningssida för varje post
    - `public` - Det som alla ser
      - `login.php` - Loginformulär för existerande användare
      - `register.php` - Formulär för att skapa en ny användare
      - `templates` - Mallar som används på många sidor
        - `footer.php` - Footer
        - `header.php` - Header
        - `sidebar.php` - Sidebar
    - `user` - Det som bara inloggad användare ser
      - `add.php` - Lägga till en post
      - `edit.php` - Ändra en post
      - `list.php` - Översikt över sina individuella posts
      - `templates` - Mallar som används på många sidor
        - `footer.php` - Footer
        - `header.php` - Header
        - `sidenav.php`
    - `home.php` - Visning av appens landingssida
  - `functions.php` - Hjälpfunktioner som exempelvis lösenordshashing
  - `password.php` - Lösenord för anslutning till databasen. **OBS!** Ska endast ligga lokalt!
  - `start.php` - Länkar ihop allt i `app`: Rootmappar för projektet. Visar error `ini_set(display_errors)`.`PDO`-objektet, Uppkoppling till databasen.
* `assets` - Icke-php innehåll
  - `css`
    - `blog.css`
    - `dashboard.css`
    - `main.css`
  - `js`
    - `editor.js` - JS för att köra WYSIWYG-editor
    - `main.js`
* `public` - Funktionalitet för sidor som alla ser (Se `public` under `views` för mer info)
  - `login.php` - Hanterar o validerar loginförsök
  - `register.php` - Postar en användare till databasen baserad på klassen `User`
* `user` - Funktionalitet för sidor som bara användare ser (Se `user` under `views` för mer info)
  - `add.php` - Postar ett inlägg till databasen baserad på klassen `Post`
  - `delete.php` - Tar bort ett inlägg
  - `edit.php` - Uppdaterar ett inlägg till databasen baserat på klassen `Post`
  - `list.php` - Hanterar en användares posts
* `index.php` - Funktionalitet för appens landningssida
* `page.php` - Funktionalitet för varje post

## Upplägg & struktur

Anteckningar från 27/4

### Idé

Slutprodukten är tänkt att bli en blogg om Front end / webbutveckling där vi i gruppen kan posta tips o tricks inom vårt område, intressanta artiklar vi läst etc. Ambitionen är att lägga upp sidan live så att den kan bli en del av våra portfolios.

### Sidor / flödesschema

* [Wireframe här](https://drive.google.com/file/d/0B-YWuZQGy3G2VXpyRkZTQmRhbzg/view?usp=sharing)
* [Mockup - Blogg](https://drive.google.com/file/d/0B-YWuZQGy3G2ZTgzMENmdWNpQ0E/view)
* [Mockup - Log in edit page](https://drive.google.com/open?id=0B-YWuZQGy3G2c0VvUXdMRFBXSFk)

### Databas

Setup för att köra localhost + db i molnet: [logga in](https://www.heliohost.org) och välj 'remote mySQL' i panelen. Lägg till din publika IP till listan. I panelen finns också phpMyAdmin mm.

* host: [johnny.heliohost.org](johnny.heliohost.org)
* db: phpgrupp_cms
* user: phpgrupp
* pass: se slack

```php
$pdo = new PDO(
    "mysql:host=johnny.heliohost.org;dbname=phpgrupp_cms;charset=utf8",
    "phpgrupp",
    "xxxxxxxx"
    );
```

#### Tabeller i databasen

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
* _body_ -- `TEXT` (brödtext)
* _tags_ -- `VARCHAR, LENGTH 260` (taggar, separerade av komma)
* _created_ -- `TIMESTAMP, CURRENT_TIMESTAMP`
* _updated_ -- `TIMESTAMP, DEFAULT NULL`

##### likes

* _like\_id_ -- `INT, PRIMARY, A_I`
* _post\_id_ -- `INT`, ~~foreign key --> posts (`ON DELETE RESTRICT , ON UPDATE CASCADE`)~~*
* _user\_id_ -- `INT`, ~~foreign key --> users (`ON DELETE RESTRICT, ON UPDATE CASCADE`)~~*

\* post_id och user_id i likes är inte längre länkad till de andra tabellerna.

### Klasser

* `User` --> Modifiera _en_ användare. Skapa användare, redigera sin profil...
  * `Admin extends User`
* `Users.php` - Hanterar hämtar/användare. get_full_user() etc...

* `Post` --> Skapa/editera poster. `new Post()`
* `Posts` --> Hantera/hämtar en eller flera poster. get_all_posts(), get_full_post() etc... 

* `Likes` --> Hanterar likes.

## Bibliotek

* [Bootstrap 4 alpha](https://v4-alpha.getbootstrap.com/)
* [TinyMCE](https://www.tinymce.com/docs/)
* [HTML Purifier](http://htmlpurifier.org)
* [Sweet Alert](https://limonte.github.io/sweetalert2/)

## Länkar

* [Instruktioner](https://github.com/FEND16/cms-php-mysql/blob/master/group_assignment_simple_cms.md)
* [Trello](https://trello.com/b/tEPopVij/php-gruppuppgift)
* [PHP Dokumentation](http://php.net/docs.php)
* [molnserver](https://www.heliohost.org)
* mejl: phpgruppuppgift@gmail.com

## Bra-att-ha-resurser

* [CMS video tutorial](https://www.youtube.com/watch?v=UbsAdx58ch0&list=PLfdtiltiRHWF0O8kS5D_3-nTzsFiPMOfM)
* [PHP creating a blog](https://thenewboston.com/videos.php?cat=74&video=19652)
