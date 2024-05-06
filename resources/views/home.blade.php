<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EduClassroom</title>
    <meta
        content="EduClassroom offers a dynamic online learning environment, fostering collaboration and innovation among educators and students."
        name="description">
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('index_assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('index_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('index_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('index_assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('index_assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('index_assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('index_assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('index_assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">


        <h1 class="logo me-auto">  <a class="navbar-brand logo" href="{{route('home')}}">

                <img src="{{Storage::disk('public')->url('images/logo-1.png')}}" width="180" height="50" class="" alt="logo">

            </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto " href="#pricing">Pricing</a></li>
                <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="#team">Team</a></li>

                {{--
                                <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="#">Drop Down 1</a></li>
                                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                            <ul>
                                                <li><a href="#">Deep Drop Down 1</a></li>
                                                <li><a href="#">Deep Drop Down 2</a></li>
                                                <li><a href="#">Deep Drop Down 3</a></li>
                                                <li><a href="#">Deep Drop Down 4</a></li>
                                                <li><a href="#">Deep Drop Down 5</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Drop Down 2</a></li>
                                        <li><a href="#">Drop Down 3</a></li>
                                        <li><a href="#">Drop Down 4</a></li>
                                    </ul>
                                </li>
                --}}

                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

                @guest
                    <li><a class="nav-link scrollto" href="{{route('login')}}">Login</a></li>
                    <li><a class="getstarted scrollto" href="{{route('register')}}">Get Started</a></li>

                @else
                    <li><a class="nav-link scrollto classrooms " href="{{route('classrooms.index')}}">Classrooms</a></li>
                    <span
                        class="badge d-flex align-items-center p-1 pe-2   rounded-pill ms-3 profile">
                            <img class="rounded-circle me-1" width="24" height="24" src="{{Auth::user()?->user_image}}"
                                 alt="">
                           {{ucwords(Auth::user()?->name)}}

                          </span>

                @endguest


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                 data-aos="fade-up" data-aos-delay="200">
                <h1>Where teaching and learning come together</h1>
                <h2>EduClassroom helps educators create engaging learning experiences they can personalize,
                    manage, and measure. Part of Google Workspace for Education, it empowers educators
                    to enhance their impact and prepare students for the future.</h2>
                <div class="d-flex justify-content-center justify-content-lg-start align-items-end gap-5 fs-5 ">
                    @guest
                        <a href="{{route('register')}}" class="btn-get-started scrollto">Get Started</a>

                    @endguest
                    <a href="#about" class=""><span>Read More <i class="bi bi-arrow-right"></i></span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{asset('index_assets/img/t1.png')}}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                    <p>
                        EduClassroom is dedicated to transforming the traditional educational landscape by providing a
                        comprehensive, easy-to-use platform for virtual learning. Our mission is to enable educators to
                        enrich their teaching methods and students to achieve their learning goals efficiently.
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Streamline course management and assignment
                            distribution
                        </li>
                        <li><i class="ri-check-double-line"></i> Facilitate interactive learning with real-time feedback
                        </li>
                        <li><i class="ri-check-double-line"></i> Foster a collaborative learning environment</li>
                    </ul>

                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        By bridging the gap between technology and the classroom, we strive to empower both teachers and
                        students with tools that enhance the educational experience. From providing a platform for
                        engaging discussions to enabling easy access to learning resources, EduClassroom is at the
                        forefront of modern educational solutions.
                    </p>
                    <a href="#" class="btn-learn-more">Learn More</a>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                    <div class="content">
                        <h3>Discover the EduClassroom Advantage</h3>
                        <p>
                            EduClassroom is designed to revolutionize the learning experience by integrating
                            cutting-edge technology with traditional teaching methods. Our platform simplifies the
                            educational process, making it more accessible, interactive, and effective for students and
                            educators alike.
                        </p>
                    </div>

                    <div class="accordion-list">
                        <ul>
                            <li>
                                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span>
                                    Interactive and Engaging Learning <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                    <p>
                                        With EduClassroom, learning goes beyond the traditional classroom. Our
                                        interactive courses and real-time feedback mechanisms keep students engaged and
                                        facilitate a deeper understanding of the subject matter.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>
                                    Simplified Assignment Distribution and Grading <i
                                        class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                    <p>
                                        Streamline your teaching workflow with our easy-to-use assignment management
                                        system. Distribute assignments and provide grades and feedback with just a few
                                        clicks, saving time for both teachers and students.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>
                                    Collaboration and Communication <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                    <p>
                                        Our platform promotes a collaborative learning environment where students can
                                        easily communicate with their peers and instructors. This fosters a community of
                                        learning that supports student success.
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>


                <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                     style='background-image: url({{asset('index_assets/img/why-us.png')}});' data-aos="zoom-in"
                     data-aos-delay="150">&nbsp;
                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                    <!-- Make sure the path to the image is correct -->
                    <img src="{{asset('index_assets/img/skills.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                    <h3>Expertise in Web Development</h3>
                    <p class="fst-italic">
                        I'm skilled in the latest web technologies, specializing in both frontend and backend
                        development to deliver high-quality digital solutions.
                    </p>

                    <div class="skills-content">

                        <div class="progress">
                            <span class="skill">HTML <i class="val">100%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">CSS <i class="val">90%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">JavaScript <i class="val">50%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">PHP <i class="val">80%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">Laravel <i class="val">85%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="progress">
                            <span class="skill">Photoshop <i class="val">55%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Services</h2>
                <p>With a focus on delivering comprehensive web development services, I specialize in creating dynamic,
                    user-friendly websites and applications. From initial design to final deployment, my goal is to help
                    clients achieve their digital objectives through state-of-the-art technology and personalized
                    solutions.</p>
            </div>

            <div class="row">
                <div class="col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-book-open"></i></div>
                        <h4><a href="">Interactive Courses</a></h4>
                        <p>Create and manage interactive courses with ease.</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                     data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-customize"></i></div>
                        <h4><a href="">Assignment Management</a></h4>
                        <p>Streamline assignments with automated distribution and grading.</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                     data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-group"></i></div>
                        <h4><a href="">Collaborative Learning</a></h4>
                        <p>Enable real-time collaboration among students for a richer learning experience.</p>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- End Services Section -->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pricing</h2>
                <p>Explore flexible plans tailored to your educational needs. EduClassroom offers a range of features
                    designed to enhance the teaching and learning experience. Find the plan that best supports your
                    goals.</p>
            </div>

            <div class="row">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3>Starter Plan</h3>
                        <h4><sup>$</sup>0<span> / month</span></h4>
                        <ul>
                            <li><i class="bx bx-check"></i> 1 classroom</li>
                            <li><i class="bx bx-check"></i> 15 students per classroom</li>
                            <li><i class="bx bx-check"></i> 2 assignment per classroom</li>
                            <li><i class="bx bx-x"></i> <span>Email notifications</span></li>
                            <li><i class="bx bx-x"></i> <span>Chat in classwork</span></li>
                        </ul>
                        <form action="{{route('subscriptions.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="period" value='3'>
                            <input type="hidden" name="plan_id" value="1">
                            <button type="submit" class="buy-btn">Get Started</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box featured">
                        <h3>Basic Plan</h3>
                        <h4><sup>$</sup>20<span> / month</span></h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Up to 5 classrooms</li>
                            <li><i class="bx bx-check"></i> Up to 50 students per classroom</li>
                            <li><i class="bx bx-check"></i> 5 assignment per classroom</li>
                            <li><i class="bx bx-check"></i> <span>Chat in classwork</span></li>

                            <li><i class="bx bx-x"></i> Email notifications to students</li>
                        </ul>
                        <form action="{{route('subscriptions.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="period" value='3'>
                            <input type="hidden" name="plan_id" value="2">
                            <button type="submit" class="buy-btn">Get Started</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <h3>Pro Plan</h3>
                        <h4><sup>$</sup>80<span> / month</span></h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Unlimited classrooms</li>
                            <li><i class="bx bx-check"></i> Unlimited students per classroom</li>
                            <li><i class="bx bx-check"></i> Personalized grading and feedback</li>
                            <li><i class="bx bx-check"></i> Email notifications to students</li>
                            <li><i class="bx bx-check"></i> Chat in classwork for interactive learning</li>
                        </ul>

                        <form action="{{route('subscriptions.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="period" value='3'>
                            <input type="hidden" name="plan_id" value="3">
                            <button type="submit" class="buy-btn">Get Started</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="flex justify-content-center mt-4">
                <div data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <h3>Institution Plan</h3>
                        <h4><sup>$</sup>Contact Us<span> for custom pricing</span></h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Customizable number of classrooms</li>
                            <li><i class="bx bx-check"></i> Custom student capacity per classroom</li>
                            <li><i class="bx bx-check"></i> Advanced analytics and reporting</li>
                            <li><i class="bx bx-check"></i> Integration with school systems</li>
                            <li><i class="bx bx-check"></i> Dedicated account manager</li>
                            <li><i class="bx bx-check"></i> Custom email and chat solutions</li>
                        </ul>
                        <a href="mailto:salehzetawi15@gmail.com" class="buy-btn">Contact Us</a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-start">
                    <h3>Let's Build Something Together</h3>
                    <p>Interested in collaborating on a project or have an opportunity you'd like to discuss? I'm always
                        open to exploring new ideas and taking on challenges. Let's connect and see how we can bring
                        innovative solutions to life.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="mailto:salehzetawi15@gmail.com">Contact Me</a>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>My Portfolio</h2>
                <p>As a motivated Computer Systems Engineering Student, I have engaged in a variety of projects that
                    showcase my skills in programming, database management, and full-stack development. Here are
                    highlights of my work, demonstrating my journey through innovative software solutions.</p>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                <!-- Project 1 -->
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-img portfolio-card"><img src="{{asset('index_assets/img/project.jpg')}}"
                                                                   class="img-fluid" alt=""></div>
                    <div class="portfolio-info project-link">
                        <h4>CV Generator For Learning</h4>
                        <p>Web</p>
                        <a href="https://github.com/salehzt100/CV_Generator" class="details-link"
                           title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-img portfolio-card"><img src="{{asset('index_assets/img/project.jpg')}}"
                                                                   class="img-fluid" alt=""></div>
                    <div class="portfolio-info project-link">
                        <h4>Restful Facebook APIs For Learning</h4>
                        <p>Web</p>
                        <a href="https://github.com/MyOrganisation100/Restful_Facebook_Apis" class="details-link"
                           title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-img portfolio-card">
                        <div class="portfolio-img"><img src="{{asset('index_assets/img/project.jpg')}}"
                                                        class="img-fluid" alt=""></div>

                    </div>
                    <div class="portfolio-info project-link">
                        <h4>Zetawi_Store</h4>
                        <p>Web</p>
                        <a href="https://github.com/salehzt100/web_project-e-commerce-" class="details-link"
                           title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <!-- Additional Project 5 -->
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-img portfolio-card"><img src="{{asset('index_assets/img/project.jpg')}}"
                                                                   class="img-fluid" alt=""></div>
                    <div class="portfolio-info project-link">
                        <h4>Implementing Data Structures in Java</h4>
                        <p>Code</p>
                        <a href="https://github.com/salehzt100/DataStructure" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>


                <!-- Additional Project 6 -->
                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-img portfolio-card"><img src="{{asset('index_assets/img/project.jpg')}}"
                                                                   class="img-fluid" alt=""></div>
                    <div class="portfolio-info project-link">
                        <h4>todo_APP</h4>
                        <p>Web</p>
                        <a href="https://github.com/salehzt100/todo-APP-Php-Project-" class="details-link"
                           title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <!-- Additional Project 7 -->
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-img portfolio-card"><img src="{{asset('index_assets/img/project.jpg')}}"
                                                                   class="img-fluid" alt=""></div>
                    <div class="portfolio-info project-link">
                        <h4>Workshop Management System (BE) For Learning</h4>
                        <p>web</p>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About Me</h2>
                <p>I'm a dedicated web developer with a passion for creating innovative digital solutions. Specializing
                    in both front-end and back-end development, I aim to deliver user-centric websites and applications
                    that meet the dynamic needs of clients.</p>
            </div>

            <div class="row">

                <div class="col-lg-12" data-aos="zoom-in" data-aos-delay="100">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="{{Storage::disk('public')->url('images/saleh.jpg')}}"
                                              class="img-fluid" alt="Your Image"></div>
                        <div class="member-info">
                            <h4>Saleh Zetawi</h4>
                            <span>Back End Developer</span>
                            <p>
                                Saleh Zetawi is a highly motivated Computer Systems Engineering student with a keen
                                interest and proficiency in computer engineering, programming, and software development.
                                With a robust academic background, Saleh has honed his skills in data structures and
                                algorithms, as well as in various programming languages including Java, C++, PHP, and
                                web development technologies such as HTML, CSS, JavaScript, and Laravel for back-end
                                development. His expertise extends to database management with MySQL and NoSQL
                                (Cassandra) and version control using Git & GitHub.
                                <br> <br> Their ability to self-learn and demonstrate leadership skills stand out as
                                notable soft skills. They have earned certificates in Data Structure, Photoshop (Basic),
                                and PHP (Basic), showcasing a commitment to continuous learning and professional
                                development.

                                <br> <br>Throughout their education and professional experiences, including an
                                internship at a leading technology firm, they have demonstrated exceptional
                                problem-solving abilities, effective communication, and a passion for innovative
                                software solutions. Their projects, which include a user-friendly CV generator for
                                students and a comprehensive Workshop Management System, illustrate their capability to
                                deliver valuable software solutions that enhance efficiency and user experience.

                                <br> <br>Their enthusiasm for technology, combined with academic achievements and
                                hands-on experience in software development, make them a strong collaborator and an
                                asset to any project aiming to leverage the latest in computer engineering and software
                                development methodologies.


                            </p>
                            <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Find answers to commonly asked questions about using our EduClassroom platform. Explore various
                    features, from assignment submissions to real-time collaboration with teachers.</p>
            </div>

            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                                                       data-bs-target="#faq-list-1">How do I submit an
                            assignment? <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <p>
                                To submit an assignment, go to the 'Classwork' tab, select the assignment you wish to
                                submit, attach any required documents, and click 'Turn in'.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                                       data-bs-target="#faq-list-2" class="collapsed">Can
                            I chat with my teacher privately? <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Yes, you can use the private comment feature on the assignment page or the messaging
                                feature if enabled by your teacher.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                                       data-bs-target="#faq-list-3" class="collapsed">What
                            is the best way to ask a question in class? <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Post your question in the 'Stream' tab to initiate a class discussion, or ask directly
                                in the 'Class Comments' if enabled by your teacher.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="400">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                                       data-bs-target="#faq-list-4" class="collapsed">How
                            do I access course materials? <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Course materials can be found under the 'Classwork' tab. You can view and download
                                materials such as lecture notes, reading assignments, and supplementary resources.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="500">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                                                       data-bs-target="#faq-list-5" class="collapsed">How
                            are grades and feedback provided? <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Grades and feedback are provided directly on the submitted assignment. You can review
                                them by going to the assignment in the 'Classwork' tab.
                            </p>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->
    web

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>If you have any questions, need assistance with EduClassroom features, or would like to provide
                    feedback, don't hesitate to reach out. Our team is dedicated to supporting your educational journey
                    and ensuring you have the best experience with our platform. Contact us anytime, and we'll be happy
                    to help.</p>
            </div>


            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>Tulkarm, Palestine</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>s.e.zetawi@gmail.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+972 569522815</p>
                        </div>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6747.420762076303!2d35.13170200000001!3d32.26587380000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d197953de4641%3A0xb82a03573d099b4a!2sTulkarm!5e0!3m2!1sen!2sus!4v1712003197274!5m2!1sen!2sus"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>

                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer"> ls

    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Stay updated with the latest features, educational tips, and best practices for online learning
                        with EduClassroom.</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>EduClassroom</h3>
                    <p>
                        Beetlead <br>
                        Tulkarm<br>
                        Palestine <br><br>
                        <strong>Phone:</strong> +972 569522815<br>
                        <strong>Email:</strong> s.e.zetawi@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Features</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-edit"></i> <a href="#">Create and Manage Assignments</a></li>
                        <li><i class="bx bx-news"></i> <a href="#">Post Class Updates</a></li>
                        <li><i class="bx bx-message"></i> <a href="#">Chat with Teachers</a></li>
                        <li><i class="bx bx-question-mark"></i> <a href="#">Ask Questions</a></li>
                        <li><i class="bx bx-book-content"></i> <a href="#">Add Course Materials</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Connect with us on social media for the latest updates and educational resources.</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>EduClassroom</span></strong>.
        </div>
        <div class="credits">
            Developed By Saleh Zetawi
        </div>
    </div>
</footer><!-- End Footer -->


<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('index_assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('index_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('index_assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('index_assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('index_assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('index_assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{asset('index_assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('index_assets/js/main.js')}}"></script>

</body>

</html>
