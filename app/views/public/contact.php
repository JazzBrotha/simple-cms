<?php 
require VIEW_ROOT . '/public/templates/header.php'; ?>

  <header class="masthead" style="background-image:url(<?php echo BASE_URL; ?>/assets/img/contact-bg.jpg)">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                  <div class="page-heading">
                      <h1>Contact Us</h1>
                      <span class="subheading">Have questions? We have answers (maybe).</span>
                  </div>
              </div>
          </div>
      </div>
  </header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
            <p>Want to get in touch with us? Fill out the form below to send us a message and we will try to get back to you within 24 hours!</p>
            <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
            <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
            <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email Address</label>
                        <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-secondary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>


<?php require VIEW_ROOT . '/public/templates/footer.php'; ?>
