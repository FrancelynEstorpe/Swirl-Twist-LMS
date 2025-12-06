@extends('layouts.nav')
@section('content')
<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="h-16 w-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white tracking-tight">
                            {{ __('Profile Settings') }}
                        </h2>
                        <p class="mt-1 text-blue-100 text-sm">
                            {{ __('Manage your account information and preferences') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Profile Information Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-blue-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 border-b border-blue-200">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white">
                            {{ __('Profile Information') }}
                        </h3>
                    </div>
                    <p class="mt-1 text-sm text-blue-50">
                        {{ __('Update your account\'s profile information and email address') }}
                    </p>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-blue-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1" style="display: none;">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 border-b border-blue-200">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white">
                            {{ __('Update Password') }}
                        </h3>
                    </div>
                    <p class="mt-1 text-sm text-blue-50">
                        {{ __('Ensure your account is using a long, random password to stay secure') }}
                    </p>
                </div>
                <div class="p-6 sm:p-8">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-red-200 hover:shadow-2xl transition-all duration-300" style="display: none;">
                <div class="bg-gradient-to-r from-red-500 to-red-600 px-6 py-4 border-b border-red-200">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white">
                            {{ __('Delete Account') }}
                        </h3>
                    </div>
                    <p class="mt-1 text-sm text-red-50">
                        {{ __('Permanently delete your account and all associated data') }}
                    </p>
                </div>
                <div class="p-6 sm:p-8 bg-red-50/30">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<style>
/* Additional Custom Styles for Profile Page */
.profile-card-enter {
    animation: slideInUp 0.4s ease-out;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Smooth hover effects */
.bg-white:hover .flex-shrink-0 svg {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

/* Custom scrollbar for profile page */
.max-w-7xl::-webkit-scrollbar {
    width: 8px;
}

.max-w-7xl::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 10px;
}

.max-w-7xl::-webkit-scrollbar-thumb {
    background: #3b82f6;
    border-radius: 10px;
}

.max-w-7xl::-webkit-scrollbar-thumb:hover {
    background: #2563eb;
}

/* Form input focus states - Blue theme */
input:focus, 
textarea:focus, 
select:focus {
    border-color: #3b82f6 !important;
    ring-color: #3b82f6 !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
}

/* Button primary blue styling */
button[type="submit"]:not(.btn-danger) {
    background: linear-gradient(135deg, #2563eb, #3b82f6) !important;
    transition: all 0.3s ease !important;
}

button[type="submit"]:not(.btn-danger):hover {
    background: linear-gradient(135deg, #1e40af, #2563eb) !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4) !important;
}

/* Success message styling */
.alert-success {
    background: linear-gradient(135deg, #10b981, #34d399);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 16px;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

/* Error message styling */
.alert-danger {
    background: linear-gradient(135deg, #ef4444, #f87171);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 16px;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

/* Labels styling */
label {
    color: #1e293b !important;
    font-weight: 600 !important;
    font-size: 0.875rem !important;
    margin-bottom: 0.5rem !important;
}

/* Card content spacing */
.p-6 form > div {
    margin-bottom: 1.5rem;
}

/* Responsive improvements */
@media (max-width: 640px) {
    .bg-gradient-to-r.from-blue-600 h2 {
        font-size: 1.5rem;
    }
    
    .p-6.sm\:p-8 {
        padding: 1.25rem;
    }
}
</style>

@endsection