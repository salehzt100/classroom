


<x-basic-layout title="Home">


    @push('styles')

        <style>


            .bi.bi-plus-circle-fill {

                fill: #47b2e4;

            }

            .bi.bi-plus-circle-fill:hover {
                fill: #11101d;

            }

        </style>


    @endpush

     <x-slot name="nav_tabs" >
    </x-slot>
    <x-slot name="breadcrumb" >
    <li class="breadcrumb-item  " aria-current="page">Classroom</li>
</x-slot>
    <!-- ======= classroom Section ======= -->
    <section id="classroom" class="classroom mt-4">
        <div class="container" data-aos="fade-up">

            <div class="section-title pe-3">
                <div class=" d-flex justify-content-between align-items-center ">
                    <h2>Classrooms</h2>

                    <span class="me-2 fs-3 ">

                        <a href="{{route('classrooms.create')}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#47b2e4" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
</svg>
                        </a>



                </span>

                </div>

            </div>

            <div class="row classroom-container p-3" data-aos="fade-up" data-aos-delay="200">

                @foreach($classrooms as $classroom)

                    <x-classroom-card :classroom="$classroom"/>

                @endforeach

            </div>



        </div>
    </section>

    @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                    crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Place the following <script> and <textarea> tags your HTML's <body> -->

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endpush
</x-basic-layout>
