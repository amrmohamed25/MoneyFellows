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
                            <h1>User Page</h1>
                        </div> <!-- end of col -->
                        <div class="col-lg-12">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                        </div>
                        @if(Auth::user()->currents->count()==0)
                            <div class="col-lg-12">
                                <h1>You didn't register any category yet</h1>
                            </div>
                        @endif
                    </div> <!-- end of row -->
                </div>
            </div>
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
@endsection
@section('slot')
    @if(Auth::user()->currents->count()!=0)
        <div class="slider-2" style="background: none;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="text-align: center">Your Categories</h1>
                        <div class="outer">
                            <table class="table table-hover bg-light">
                                <thead>
                                <tr>
                                    <th scope="col">Current ID</th>
                                    <th scope="col">Current Name</th>
                                    <th scope="col">Money</th>
                                    <th scope="col">Months to be paid</th>
                                    <th scope="col">Is Started</th>
                                    <th scope="col">Is paid</th>
                                    <th scope="col">Due Date</th>

                                    <th scope="col">Functions</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach(Auth::user()->currents as $current)

                                    <tr>
                                        <td>{{$current->id}}</td>
                                        <td>{{$current->name}}</td>
                                        <td>{{$current->pivot->money}}</td>

                                        <td>{{$current->pivot->months_left_to_be_paid}}</td>
                                        @if($current->due_date==null)
                                            <td>No</td>
                                        @else
                                            <td>Yes</td>
                                        @endif

                                        @if($current->pivot->is_paid==0)
                                            <td>No</td>
                                        @else
                                            <td>Yes</td>
                                        @endif
                                        <td>{{$current->due_date}}</td>
                                        <td>
                                            <div class="button-wrapper">
                                                @if($current->pivot->is_paid==0 &&$current->due_date!=null)
                                                    <a class="btn-solid-pay page-scroll"
                                                       href="{{url('/pay/'.$current->id)}}">Pay</a>
                                                @endif
                                                <a class="btn-solid-reg page-scroll"
                                                   href="{{ url('/edit/'.$current->id) }}">Edit</a>
                                                <a class="btn-solid-leave page-scroll"
                                                   href="{{ url('/delete/'.$current->id) }}">Leave</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div>
    @endif
@endsection
