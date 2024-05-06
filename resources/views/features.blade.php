

<x-main-layout title="About As">
    <x-slot name="nav">
        <x-nav.home-nav />
    </x-slot>
    @push('styles')
        <style>
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
        </style>
    @endpush

        <div class="container feature-section">
            <h2 class="text-center mb-5">Key Features</h2>
            <div class="row">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-person-fill"></i> <!-- Placeholder icon from Bootstrap Icons -->
                        </div>
                        <h5>Personalized Dashboard</h5>
                        <p>Quick access to your courses, upcoming assignments, and alerts.</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-journal-bookmark-fill"></i> <!-- Placeholder icon -->
                        </div>
                        <h5>Resource Library</h5>
                        <p>All your study materials in one place, easily accessible and organized.</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="feature-item text-center">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-chat-dots-fill"></i> <!-- Placeholder icon -->
                        </div>
                        <h5>Interactive Discussions</h5>
                        <p>Engage in meaningful conversations and collaborate with classmates.</p>
                    </div>
                </div>
                <!-- Add more features as necessary -->
            </div>
        </div>

</x-main-layout>
