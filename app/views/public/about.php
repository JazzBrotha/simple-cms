<?php 
require VIEW_ROOT . '/public/templates/header.php'; ?>

<header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/about-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="page-heading">
                    <h1>About Us</h1>
                    <span class="subheading">This is what we do.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
            <p>This site is the result of a group project made by Jesper Engström, Mattias Östblom and Evelina Sundin.</p>
            <p>The assignment was to create a simple cms with PHP and MYSQL where you can add, edit and delete content of the blog.</p>
            <p>We wanted to create something meaningful and relative to what we study, therefor we came up with the idea to create a front end blog where anybody can become a member and contribute to knowledge within front end development.</p>
            <p>As a member you can upload posts, like other members posts and contribute to knowledge and smart ideas that you would like to share with others that have the same interest in front end development as you do.
            If there is something in particular that you are interested in, for example Javascript. Click on the tags in the posts to read more about this specifik topic.</p>
            <p>Whether you work, study or just find it interesting with development you are welcome to contribute to or read the blog. All ideas and contributions are appreciated.</p>
        </div>
    </div>
</div>

<hr>

<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>
