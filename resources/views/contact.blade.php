

<x-main-layout title="About As">
    <x-slot name="nav">
        <x-nav.home-nav />
    </x-slot>
    @push('styles')

        <style>
            .contact-section {
                padding: 2rem 0;
            }
            .contact-form {
                background-color: #f8f9fa;
                padding: 2rem;
                border-radius: 0.5rem;
                box-shadow: 0 0.5rem 1rem rgba(0,0,0,.1);
            }
            .form-control {
                height: 3rem;
            }



        </style>
    @endpush

        <div class="container contact-section">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2 class="text-center mb-4">Contact Us</h2>
                    <p class=" mb-5 text-center">The best way to contact us is to use our contact form below. Please fill out all of the required fields and we will get back to you as soon as possible.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">

                    <div class="contact-form">
                        <form action="/submit-contact-form" method="POST">
                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <!-- Subject Field -->
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <!-- Message Textarea -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn main-bg-color">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-main-layout>
