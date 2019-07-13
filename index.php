<?php include "view/layout/header.php";?>
<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div class="site-logo mr-auto w-25"><a href="index.php"><img src="src/images/logo.png"/> Book Share</a></div>

                <div class="mx-auto text-center">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                            <li><a href="#home-section" class="nav-link">Home</a></li>
                            <li><a href="#courses-section" class="nav-link">Latest Books</a></li>
                            <li><a href="#programs-section" class="nav-link">About Book Share</a></li>
                            <li><a href="#teachers-section" class="nav-link">About Us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="ml-auto w-25">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                            <li class="cta"><a href="main/login.php" class="nav-link"><span>Login</span></a></li>
                        </ul>
                    </nav>
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>

    </header>

    <div class="intro-section" id="home-section">

        <div class="slide-1" style="background-image: url('src/images/hero_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4" style="font-weight: bold !important;">
                                <h1  data-aos="fade-up" data-aos-delay="100" style="color:#efff00;">Give a Book away and Bright Someone's Life</h1>
                                <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Books are valuable assets. Give your unused books to those who need it and Collect books that you don't have !   </p>
                                <p data-aos="fade-up" data-aos-delay="300"><a href="main/signup.php" class="btn btn-primary py-3 px-5 btn-pill">Register Now</a></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="site-section courses-title" id="courses-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">Latest Arrival</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row">

                <div class="owl-carousel col-12 nonloop-block-14">

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="#"><img src="src/images/img_1.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <span class="course-price">New</span>
                            <div class="meta"><span class="icon-clock-o"></span>Literature</div>
                            <h3><a href="#">Geetanjali</a></h3>
                            <p>Aavailable at Mirpur</p>
                        </div>

                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="#"><img src="src/images/img_2.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <span class="course-price">New</span>
                            <div class="meta"><span class="icon-clock-o"></span>Computer Science</div>
                            <h3><a href="#">Introduction to C++</a></h3>
                            <p>Available at Shahabag</p>
                        </div>

                    </div>

                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="#"><img src="src/images/img_3.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <span class="course-price">New</span>
                            <div class="meta"><span class="icon-clock-o"></span>Geography</div>
                            <h3><a href="#">The Atmosphere</a></h3>
                            <p>Available at Banani</p>
                        </div>

                    </div>



                    <div class="course bg-white h-100 align-self-stretch">
                        <figure class="m-0">
                            <a href="#"><img src="src/images/img_4.jpg" alt="Image" class="img-fluid"></a>
                        </figure>
                        <div class="course-inner-text py-4 px-4">
                            <span class="course-price">New</span>
                            <div class="meta"><span class="icon-clock-o"></span>History</div>
                            <h3><a href="#">History of Arabs</a></h3>
                            <p>Available at Mohammadpur</p>
                        </div>

                    </div>
                </div>



            </div>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <button class="customPrevBtn btn btn-primary m-1">Prev</button>
                    <button class="customNextBtn btn btn-primary m-1">Next</button>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section" id="programs-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">About Us</h2>
                    <p>We are some energetic, talented and volunteer students from Bangladesh University of Business and Technology (BUBT) helping people to build book reading habit through <font face="bold">Book Share</font> Application</p>
                </div>
            </div>
            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="src/images/k_share.jpg" alt="Image" class="img-fluid"  style="border-radius: 12%;">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Share Knowledge</h2>
                    <p class="mb-4" style="font-weight: normal; color:deeppink">Did you complete Graduation or any level?<br>
                        <span style="color:darkblue;font-size:25px;">Do You have unused books?</span>
                        <br>
                        Do you want other people read your valuable books? <br>
                        <span style="color:darkblue;font-size:25px;">Then this the platform to make use of your Books</span>  </p>


                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="src/images/undraw_teaching.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Increase Learning Habit</h2>
                    <p class="mb-4">Search Books from database and collect your needs</p>



                </div>
            </div>

            <div class="row mb-5 align-items-center">
                <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <img src="src/images/poor_student.jpeg" alt="Image" class="img-fluid" style="border-radius: 12%;">
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-black mb-4">Help Poor and Underprivileged Students</h2>
                    <p class="mb-4">There are many poor and underprivileged students. Help them by giving your unused books.</p>



                </div>
            </div>

        </div>
    </div>

    <div class="site-section" id="teachers-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
                    <h2 class="section-title">We are Team</h2>
                    <p class="mb-5">We are team of some energetic, out of the box thinkers from BUBT who wants to build life-long education for all so that none leaves behind</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="teacher text-center">
                        <img src="src/images/person_1.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
                        <div class="py-2">
                            <h3 class="text-black">Rajon Chandra Das</h3>
                            <p class="position">Team Lead</p>
                            <p>Loves PHP, JS, MySql, etc.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="teacher text-center">
                        <img src="src/images/person_2.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
                        <div class="py-2">
                            <h3 class="text-black">Md. Atikur Rahman</h3>
                            <p class="position">Team Member</p>
                            <p>Loves HTML, CSS</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="teacher text-center">
                        <img src="src/images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
                        <div class="py-2">
                            <h3 class="text-black">Kazi Yasin Arafat</h3>
                            <p class="position">Team Member</p>
                            <p>Loves HTML, CSS</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('src/images/hero_1.jpg');">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 text-center testimony">
                    <img src="src/images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                    <h3 class="mb-4"><font size="26" color="#f9b620"> Md Saifur Rahman</font><br>
                        Assistant Professor<br>
                        Department of CSE<br>
                            Bangladesh University of Business and Technology (BUBT)
                        </h3>
                    <blockquote>
                        <p>&ldquo; Majestic, wondrous, charming, gracious, polite, talented, genius, elegant, stunning Project Advisor "</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-7">



                    <h2 class="section-title mb-3">Message Us</h2>
                    <p class="mb-5">We are always ready to help you. Kindly text us and you will get reply soon.</p>

                    <form method="post" data-aos="fade">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-lg-0">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Last name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="" cols="30" rows="10" placeholder="Write your message here."></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">

                                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="Send Message">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include "view/layout/footer.php";?>