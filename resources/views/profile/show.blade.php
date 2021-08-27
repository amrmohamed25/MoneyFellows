@extends('layouts.app')
@section('style')
        <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/fontawesome-all.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/swiper.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
@endsection
   @section('header')
        <header id="header" class="header">
            <div class="header-content">
                <div id="pricing" class="cards-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" style="height: 300px;position: relative;">
                                <h1>Profile</h1>
                            </div> <!-- end of col -->
                            <div class="col-lg-12">
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                            </div>
                        </div> <!-- end of row -->
                    </div>
                </div>
            </div> <!-- end of header-content -->
        </header> <!-- end of header -->
   @endsection

    @section('slot')
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
 @endsection
