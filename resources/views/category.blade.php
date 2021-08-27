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

    <!-- Header -->
    <header id="header" class="header">
        {{--    <div class="header-content">--}}
        <div class="container">
            <div class="row">
                <div style="height: 200px">&nbsp;</div>
                <div class="col-lg-12">
                    <div class="text-container">
                        <h1>Create a Category</h1>
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <form method="POST" action="/store_category">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="money">Money</label>
                                <input class="form-control" type="number" min="1" name="money" required>
                            </div>
                            <div class="form-group">
                                <label for="months">Months</label>
                                <input class="form-control" type="number" min="2" name="months" required>
                            </div>
                            <div class="form-group">
                                <label for="no_of_members">Members</label>
                                <input class="form-control" type="number" min="2" name="no_of_members" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
        {{--    </div>--}}
    </header> <!-- end of header -->
    <!-- end of header -->
@endsection


