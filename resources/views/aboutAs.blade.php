

<x-main-layout title="About As">
    <x-slot name="nav">
        <x-nav.home-nav />
    </x-slot>
    @push('styles')
        <style>
            .header-section {
                background-color: #f8f9fa;
                padding: 2rem 0;
                border-bottom: 1px solid #e3e3e3;
            }
            .team-member {
                margin-bottom: 1rem;
            }
            .team-photo {
                max-width: 200px;
                border-radius: 200px;
            }

        </style>
    @endpush


        <div class="container header-section text-center">
            <h1 class="main-color main-shadow">About Classroom</h1>
            <p>Discover the journey and people behind our platform.</p>
        </div>

        <div class="container py-5">
            <!-- Mission and Vision -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="main-color main-shadow">Our Mission</h2>
                    <p>To provide a seamless and interactive online learning environment for schools worldwide.</p>
                </div>
                <div class="col-md-6">
                    <h2 class="main-color main-shadow">Our Vision</h2>
                    <p>To be the leading educational platform fostering innovation and learning excellence.</p>
                </div>
            </div>

            <!-- Core Values -->
            <div class="row mb-4">
                <div class="col">
                    <h2 class="main-color main-shadow ">Core Values</h2>
                    <ul class="list-unstyled">
                        <li>Accessibility: Creating an inclusive learning space for all.</li>
                        <li>Community: Building strong relationships among educators and students.</li>
                        <li>Innovation: Continuously enhancing the learning experience.</li>
                    </ul>
                </div>
            </div>

            <div class="text-center d-flex justify-content-center">
                <!-- The Team -->

                <div class="mb-4">
                    <div class="col">
                        <h2 class="main-color main-shadow">The Developers</h2>
                        <div class="row">
                            <!-- Team Member -->
                            <div class=" text-center team-member  mt-3">
                                <img src="{{Storage::disk('public')->url('/images/saleh.jpg')}}" alt="Team Member" class="img-fluid team-photo mb-2 ">
                                <h5>Saleh Zetawi</h5>
                                <p>Developer</p>
                            </div>
                            <!-- You can add more team members here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center d-flex justify-content-center">

            <!-- History -->
            <div class="row">
                <div class="col">
                    <h2 class="main-color main-shadow">History</h2>
                    <p>Classroom Clone began as a passion project by a group of students and has evolved into a platform used by numerous educational institutions to facilitate remote learning and classroom management.</p>
                </div>
            </div>
            </div>
        </div>

</x-main-layout>
