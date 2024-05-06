
<x-basic-layout title="Trashed Classrooms">


    @push('styles')

    @endpush

        <x-alert name="success" class="alert-success" />

        <x-alert name="error" class="alert-danger" />
    <x-slot name="nav_tabs" >
    </x-slot>
    <x-slot name="breadcrumb" >
        <li class="breadcrumb-item  " aria-current="page">Classroom</li>
    </x-slot>
    <!-- ======= classroom Section ======= -->
    <section id="classroom" class="classroom mt-4">
        <div class="container" data-aos="fade-up">

            <div class="section-title pe-3">
                    <h2>Trashed Classrooms</h2>

            </div>

            <div class="row classroom-container p-3" data-aos="fade-up" data-aos-delay="200">

                @foreach($classrooms as $classroom)

                    <x-classroom-trashed-card :classroom="$classroom" />

                @endforeach

            </div>



        </div>
    </section>

</x-basic-layout>
