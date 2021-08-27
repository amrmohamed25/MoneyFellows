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
            {{--    <div class="header-content">--}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-container">
                            <h1>Join a Category</h1>
                            <form method="POST" action="/store">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" name="name" value="{{$user->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" name="email" value="{{$user->email}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="current_name">Category Name</label>
                                    <input class="form-control" name="current_name" value="{{$current->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="current_id" value="{{$current->id}}" readonly
                                           hidden>
                                </div>
                                <div class="form-group">
                                    <label for="money">Category Money</label>
                                    <input class="form-control" name="money" value="{{$current->money}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_of_members">Category Members</label>
                                    <input class="form-control" name="no_of_members"
                                           value="{{$current->users()->count()}}/{{$current->no_of_members}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="months">Months</label>
                                    <input class="form-control" name="months" value="{{$current->months}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="months_left_to_be_paid">Please Choose when do you want to recieve the
                                        money <strong>(Months from now)</strong></label>
                                    <select class="form-control" name="months_left_to_be_paid">
                                        @foreach($numbers as $number)
                                            <option>{{$number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>
                        </div> <!-- end of col -->
                        <h4>Hint:Category will start when it reach the number of members</h4>
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of header-content -->
            {{--    </div>--}}
        </header> <!-- end of header -->
        <!-- end of header -->
@endsection
