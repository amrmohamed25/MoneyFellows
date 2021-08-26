@extends('layouts.app')

@section('style')
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
@endsection
@section('header')
    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    <header id="header" class="header">
        <div class="header-content">
            <div id="pricing" class="cards-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="height: 300px;position: relative;">
                            <h2>Multiple Pricing Options</h2>
                            <p class="p-heading p-large">We've prepared pricing plans for all budgets so you can get
                                started right
                                away. They're great for small companies and large organizations</p>
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
    <!-- end of header -->
@endsection

@section('slot')
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="slider-2" style="background: none;padding-bottom: 0px;">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-container">
                            <div class="swiper-container card-slider" style="position: relative;bottom: 200px ">
                                <div class="swiper-wrapper">
                                    <!-- Card-->
                                    @foreach($categories as $category)
                                        @if($loop->index%4==0)
                                            <div class="swiper-slide">
                                                <!-- Slide -->
                                                @endif
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title">{{$category->name}}</div>
                                                        <div class="card-subtitle">Category
                                                            ID: {{$category->id}}</div>
                                                        <hr class="cell-divide-hr">
                                                        <div class="price">
                                                            <span class="currency">EGP</span><span
                                                                class="value">{{$category->money}}</span>
                                                            <div class="frequency">monthly</div>
                                                        </div>
                                                        <hr class="cell-divide-hr">
                                                        <ul class="list-unstyled li-space-lg">
                                                            <li class="media">
                                                                <i class="fas fa-check"></i>
                                                                <div class="media-body">Category
                                                                    Months: {{$category->months}}</div>
                                                            </li>
                                                            <li class="media">
                                                                <i class="fas fa-check"></i>
                                                                <div class="media-body">Category
                                                                    Members: {{$category->no_of_members}}</div>
                                                            </li>
                                                        </ul>
                                                        <div class="button-wrapper">
                                                            @if(Auth::id()!=null)
                                                                <a class="btn-solid-reg page-scroll"
                                                                   href="{{ url('/join/'.$category->id) }}">REQUEST</a>
                                                            @else
                                                                <a class="btn-solid-reg page-scroll"
                                                                   href="{{ url('/login') }}">REQUEST</a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div> <!-- end of card -->
                                                <!-- end of card -->
                                                @if($loop->index==3||($loop->index%4==0 && $loop->index!=0 && $loop->index!=4)||$loop->last)
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div>
    </div>
@endsection
