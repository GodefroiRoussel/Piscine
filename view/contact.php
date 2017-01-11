<head>
  <!-- BOOTSTRAP STYLES-->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="../assets/css/custom.css" rel="stylesheet" />
  <link href="../assets/css/contact.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
  <body>
    <div id="wrapper">
        <?php include("menu/menuTop.php"); ?>
        <!-- /. NAV TOP  -->
        <!-- NAV SIDE only if we are connected -->
        <?php if (isset($_COOKIE["token"]) && verificationToken($decoded_array)){
           include("menu/side_menu.php");
        } ?>

        <div id="page-wrapper">
  				<div id="page-inner">
                        <!-- Form Area -->
                        <div class="contact-form">
                            <!-- Form -->
                            <form id="contact-us" method="post" action="#">
                                <!-- Left Inputs -->
                                <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                                    <!-- Email -->
                                    <input type="email" name="mail" id="mail" required="required" class="form" placeholder="Email" />
                                    <!-- Subject -->
                                    <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                                </div><!-- End Left Inputs -->
                                <!-- Right Inputs -->
                                <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
                                    <!-- Message -->
                                    <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                                </div><!-- End Right Inputs -->
                                <!-- Bottom Submit -->
                                <div class="relative fullwidth col-xs-12">
                                    <!-- Send Button -->
                                    <button type="submit" id="submit" name="submit" class="form-btn semibold">Envoyer Message</button>
                                </div><!-- End Bottom Submit -->
                                <!-- Clear -->
                                <div class="clear"></div>
                            </form>

                            <!-- Your Mail Message -->
                            <div class="mail-message-area">
                                <!-- Message -->
                                <div class="alert gray-bg mail-message not-visible-message">
                                    <strong>Merci !</strong> Votre email a été délivré.
                                </div>
                            </div>
                    </div>
                  </div>
                  <!-- /. PAGE-INNER -->
                </div>
                <!-- /. PAGE-WRAPPER -->
          </div>
          <!-- /. INNER -->
    </div>
    <!-- /. WRAPPER  -->
  </body>
</html>
