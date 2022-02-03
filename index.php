<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Finance Business HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="frontend/assets/css/fontawesome.css">
    <link rel="stylesheet" href="frontend/assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="frontend/assets/css/owl.css">
  </head>

  <body>
  <?php 
    session_start();
    require_once 'db.php';
  ?>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>090-080-0760</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Finance Business</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#top">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="services.html">Our Services</a>
              </li>                          
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="one-page.html">One Page</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <?php
            $get_query = "SELECT * FROM banners WHERE read_status='1'";
            $banner_from_db = mysqli_query($db_connect, $get_query);

            foreach($banner_from_db as $banners):
          ?>
          <div class="item item-1">
            <div class="img-fill" style="background-image: url(<?= $banners['image_location']?>);">
                <div class="text-content">
                  <h6><?= $banners['banner_sub_title']?></h6>
                  <h4><?= $banners['banner_title']?></h4>
                  <p><?= $banners['banner_detail']?></p>
                  <a href="contact.html" class="filled-button">contact us</a>
                </div>
            </div>
          </div>
          <?php
            endforeach
          ?>
        </div>
    </div>

    <!-- Banner Ends Here -->
    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Request a call back right now ?</h4>
            <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
          </div>
          <div class="col-md-4">
            <a href="contact.html" class="border-button">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php
                $get_service_head_query = "SELECT * FROM service_heads WHERE active_status = '1'";
                $service_head_from_db = mysqli_query($db_connect, $get_service_head_query);
            ?>
            <?php foreach ($service_head_from_db as $service_head) : ?>
              <div class="section-heading">
                <h2><?= $service_head['black_head'] ?> <em><?= $service_head['green_head'] ?></em></h2>
                <span><?= $service_head['service_sub_head'] ?></span>
              </div>
            <?php endforeach ?>
          </div>
          <?php
            $get_service_item_query = "SELECT * FROM service_items WHERE active_status = '1' ORDER BY id ASC LIMIT 3";
            $service_item_from_db = mysqli_query($db_connect, $get_service_item_query);
            foreach ($service_item_from_db as $service_items) :
          ?>
          <div class="col-md-4">
            <div class="service-item">
              <img src="<?= $service_items['image_location'] ?>" alt="Service Item Image">
              <div class="down-content">
                <h4><?= $service_items['service_item_head'] ?></h4>
                <p><?= $service_items['service_item_detail'] ?></p>
                <a href="" class="filled-button">Read More</a>
              </div>
            </div>
          </div>
          <?php
            endforeach
          ?>
        </div>
      </div>
    </div>

    <?php 
        $get_fun_facts_heading_query = "SELECT * FROM fun_facts WHERE active_status = 1";
        $from_fun_facts_heading = mysqli_query($db_connect, $get_fun_facts_heading_query);
        foreach($from_fun_facts_heading as $fun_fact_head) :
    ?>
    <div class="fun-facts" style="background-image: url(<?= $fun_fact_head['image_location']?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="left-content">
              <span><?= $fun_fact_head['sub_head'] ?></span>
              <h2><?= $fun_fact_head['white_head'] ?> <em><?= $fun_fact_head['green_head'] ?></em></h2>
              <p><?= $fun_fact_head['paragraph_one'] ?> 
              <br><br><?= $fun_fact_head['paragraph_two'] ?></p>
              <a href="" class="filled-button">Read More</a>
              <?php endforeach ?>
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="row">
              <?php
                $get_fun_fact_counter_query = "SELECT * FROM fun_fact_counters WHERE active_status = 1 LIMIT 4";
                $fun_fact_counter_from_db = mysqli_query($db_connect, $get_fun_fact_counter_query);
                foreach ($fun_fact_counter_from_db as $counter) :
              ?>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit"><?= $counter['count_value'] ?></div>
                  <div class="count-title"><?= $counter['count_head'] ?></div>
                </div>
              </div>
              <?php endforeach ?>
              <!-- <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">1280</div>
                  <div class="count-title">Great Reviews</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">578</div>
                  <div class="count-title">Projects Done</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">26</div>
                  <div class="count-title">Awards Won</div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6">
                  <div class="left-image">
                    <img src="frontend/assets/images/more-info.jpg" alt="">
                  </div>
                </div>
                <div class="col-md-6 align-self-center">
                  <div class="right-content">
                    <span>Who we are</span>
                    <h2>Get to know about <em>our company</em></h2>
                    <p>Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus<br><br>Praes end at dictum metus. Morbi id hendrerit lectus, nec dapibus ex. Etiam ipsum quam, luctus eu egestas eget, tincidunt</p>
                    <a href="#" class="filled-button">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>What they say <em>about us</em></h2>
              <span>testimonials from our greatest clients</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>George Walker</h4>
                  <span>Chief Financial Analyst</span>
                  <p>"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>John Smith</h4>
                  <span>Market Specialist</span>
                  <p>"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc. Mauris accumsan, arcu id ornare malesuada, est nulla luctus nisi."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>David Wood</h4>
                  <span>Chief Accountant</span>
                  <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Andrew Boom</h4>
                  <span>Marketing Head</span>
                  <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="callback-form" id="callback-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Request a <em>call back</em></h2>
              <span>Etiam suscipit ante a odio consequat</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
              <form id="contact" action="admin/guest_message_post.php" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php
                      if (isset($_SESSION['guest_mes_emp'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                      <?php 
                        echo $_SESSION['guest_mes_emp'];
                        unset($_SESSION['guest_mes_emp']);
                      ?>
                    </div>
                    <?php
                      }

                      if (isset($_SESSION['guest_mes_name'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                      <?php 
                        echo $_SESSION['guest_mes_name'];
                        unset($_SESSION['guest_mes_name']);
                      ?>
                    </div>
                    <?php
                      }

                      if (isset($_SESSION['guest_mes_email'])) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                      <?php 
                        echo $_SESSION['guest_mes_email'];
                        unset($_SESSION['guest_mes_email']);
                      ?>
                    </div>
                    <?php
                      }

                      if (isset($_SESSION['guest_mes_success'])) {
                    ?>
                    <div class="alert alert-success" role="alert">
                      <?php 
                        echo $_SESSION['guest_mes_success'];
                        unset($_SESSION['guest_mes_success']);
                      ?>
                    </div>
                    <?php
                      }
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="guest_name" type="text" class="form-control" id="name" placeholder="Full Name" value="<?php 
                          if (isset($_SESSION['send_value'])) {
                            if ($_SESSION['send_value'] == 0) {
                              echo $_SESSION['guest_name'];
                            }
                          }
                        ?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="guest_email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" value="<?php 
                          if (isset($_SESSION['send_value'])) {
                            if ($_SESSION['send_value'] == 0) {
                              echo $_SESSION['guest_email'];
                            }
                          }
                        ?>">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="guest_message" rows="6" class="form-control" id="message" placeholder="Your Message"><?php 
                          if (isset($_SESSION['send_value'])) {
                            if ($_SESSION['send_value'] == 0) {
                              echo $_SESSION['guest_message'];
                            }
                            unset($_SESSION['guest_email']);
                            unset($_SESSION['guest_name']);
                            unset($_SESSION['guest_message']);
                            unset($_SESSION['send_value']);
                          }
                        ?></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="border-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="partners">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-partners owl-carousel">
            
              <div class="partner-item">
                <img src="frontend/assets/images/client-01.png" title="1" alt="1">
              </div>
              
              <div class="partner-item">
                <img src="frontend/assets/images/client-01.png" title="2" alt="2">
              </div>
              
              <div class="partner-item">
                <img src="frontend/assets/images/client-01.png" title="3" alt="3">
              </div>
              
              <div class="partner-item">
                <img src="frontend/assets/images/client-01.png" title="4" alt="4">
              </div>
              
              <div class="partner-item">
                <img src="frontend/assets/images/client-01.png" title="5" alt="5">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-item">
            <h4>Finance Business</h4>
            <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
          <div class="col-md-4 footer-item">
            <h4>Useful Links</h4>
            <ul class="menu-list">
              <li><a href="#">Vivamus ut tellus mi</a></li>
              <li><a href="#">Nulla nec cursus elit</a></li>
              <li><a href="#">Vulputate sed nec</a></li>
              <li><a href="#">Cursus augue hasellus</a></li>
              <li><a href="#">Lacinia ac sapien</a></li>
            </ul>
          </div>
          <div class="col-md-4 footer-item">
            <h4>Additional Pages</h4>
            <ul class="menu-list">
              <li><a href="#">About Us</a></li>
              <li><a href="#">How We Work</a></li>
              <li><a href="#">Quick Support</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Copyright &copy; 2020 Financial Business Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="frontend/vendor/jquery/jquery.min.js"></script>
    <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="frontend/assets/js/custom.js"></script>
    <script src="frontend/assets/js/owl.js"></script>
    <script src="frontend/assets/js/slick.js"></script>
    <script src="frontend/assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>