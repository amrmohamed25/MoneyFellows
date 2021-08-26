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
                        <h1 style="margin-top: 100px">Edit Category</h1>
                        <div class="col-lg-12">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                        </div>
                        <form method="POST" action="/update/{{$current->id}}">
                            @csrf
                            @if($user->email!='admin@admin.com')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" name="name" value="{{$user->name}}" readonly>
                                </div>
                            @endif
                            @if($user->email!='admin@admin.com')
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" name="email" value="{{$user->email}}" readonly>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="current_name">Category Name</label>
                                @if($user->email!='admin@admin.com')
                                    <input class="form-control" name="current_name" value="{{$current->name}}"
                                           readonly>
                                @else
                                    <input class="form-control" name="current_name" value="{{$current->name}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="current_id" value="{{$current->id}}" readonly
                                       hidden>
                            </div>
                            <div class="form-group">
                                <label for="money">Category Money</label>
                                @if($user->email!='admin@admin.com')
                                    <input class="form-control" name="money" value="{{$current->money}}" readonly>
                                @else
                                    <input class="form-control" name="money" min="1" value="{{$current->money}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="no_of_members">Category Members</label>
                                @if($user->email!='admin@admin.com')
                                    <input class="form-control" name="no_of_members"
                                           value="{{$current->no_of_members}}" readonly>
                                @else
                                    <input class="form-control" name="no_of_members" type="number"
                                           min="2" value="{{$current->no_of_members}}">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="months">Months</label>
                                @if($user->email!='admin@admin.com')
                                    <input class="form-control" name="months" value="{{$current->months}}" readonly>
                                @else
                                    <input class="form-control" min="2" name="months" type="number" value="{{$current->months}}">
                                @endif
                            </div>
                            @if($user->email!='admin@admin.com')
                                <div class="form-group">
                                    <label for="months_left_to_be_paid">Please Choose when do you want to recieve
                                        the
                                        money <strong>(Months from now)</strong></label>
                                    <select class="form-control" name="months_left_to_be_paid">
                                        @foreach($numbers as $number)
                                            <option>{{$number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
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
