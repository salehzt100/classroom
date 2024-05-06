<x-main-layout title="Home">

    <x-slot name="nav">
        <x-nav.home-nav />
    </x-slot>
    @push('styles')

        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>

        <style>
            .get-start:hover {
                border-color: rgb(182, 160, 146);
            }
             .feature-item {
                 padding: 2rem;
                 border-radius: 0.5rem;
                 background-color: #f8f9fa;
                 margin-bottom: 1rem;
             }
            .feature-icon {
                font-size: 2rem; /* Adjust size as necessary */
                color: #0d6efd; /* Bootstrap primary color */
            }
            .feature-section {
                padding-top: 2rem;
            }
            .feature-item:hover{
                box-shadow: 4px 4px 10px rgb(182, 160, 146);
                translate:0 -5px;
                transition: .3s;

            }
        </style>
    @endpush

    <section class="py-5">
        <div class="container px-5">

            <h1 class="fw-bolder fs-5 mb-4">Classroom</h1>
            <div class="card border-0 shadow rounded-3 overflow-hidden pl-3">
                <div class="card-body p-0">
                    <div class="row gx-0">
                        <div class="col-lg-6 col-xl-6 py-lg-5">
                            <div class="p-4 p-md-5">
                                <div class="h2 fw-bolder">Where teaching and learning come together</div>
                                <p>Classroom helps educators create engaging learning experiences they can personalize,
                                    manage, and measure. Part of Google Workspace for Education, it empowers educators
                                    to enhance their impact and prepare students for the future.</p>

                                <div>
                                    <span>
                                        <a class="btn main-bg-color get-start" href="{{ route('register') }}">Get start</a>
                                    </span>
                                    <span>
                                        <a class="text-decoration-none main-color ms-4"
                                           href="{{ route('aboutAs') }}">
                                            Read more
                                            <i class="bi bi-arrow-right"></i>

                                        </a>

                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7">
                            <div class="bg-featured-blog">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <div class="container feature-section px-5">
            <h2 class="fw-bolder fs-10 mb-4 main-color main-shadow">Featured </h2>
            <div class="row">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="feature-item text-center ">
                        <div class="feature-icon mb-3 main-color">
                            <i class="bi bi-person-fill"></i> <!-- Placeholder icon from Bootstrap Icons -->
                        </div>
                        <h5>Personalized Dashboard</h5>
                        <p>Quick access to your courses, upcoming assignments, and alerts.</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="feature-item text-center ">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-journal-bookmark-fill main-color"></i> <!-- Placeholder icon -->
                        </div>
                        <h5>Resource Library</h5>
                        <p>All your study materials in one place, easily accessible and organized.</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="feature-item text-center ">
                        <div class="feature-icon mb-3 ">
                            <i class="bi bi-chat-dots-fill main-color"></i> <!-- Placeholder icon -->
                        </div>
                        <h5>Interactive Discussions</h5>
                        <p>Engage in meaningful conversations and collaborate with classmates.</p>
                    </div>
                </div>
                <!-- Add more features as necessary -->


                <div class="text-end mb-5 mb-xl-0">
                    <a class="text-decoration-none" href="{{route('features')}}">
                        See All Features
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
{{--
        <!-- Blog preview section-->
    <section class="py-5">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..."/>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <div class="h5 card-title mb-3">Blog post title</div>
                            </a>
                            <p class="card-text mb-0">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                         alt="..."/>
                                    <div class="small">
                                        <div class="fw-bold">Kelly Rowan</div>
                                        <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..."/>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <div class="h5 card-title mb-3">Another blog post title</div>
                            </a>
                            <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of
                                each card. Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                         alt="..."/>
                                    <div class="small">
                                        <div class="fw-bold">Josiah Barclay</div>
                                        <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..."/>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <div class="h5 card-title mb-3">The last blog post title is a little bit longer than the
                                    others
                                </div>
                            </a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                         alt="..."/>
                                    <div class="small">
                                        <div class="fw-bold">Evelyn Martinez</div>
                                        <div class="text-muted">April 2, 2023 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mb-5 mb-xl-0">
                <a class="text-decoration-none" href="#!">
                    More stories
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>--}}

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    @endpush

</x-main-layout>

