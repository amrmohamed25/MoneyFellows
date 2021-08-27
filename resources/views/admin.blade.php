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
                            <h1>Admin Page</h1>
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
<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Categories</h1>
                <div class="button-wrapper" style="text-align: center;margin-bottom: 5px">
                    <a class="btn-solid-pay page-scroll"
                       href="{{url('/category')}}">Create new Category</a>
                </div>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Money</th>
                            <th scope="col">Months</th>
                            <th scope="col">Members</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Functions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->money}}</td>
                                <td>{{$category->months}}</td>
                                <td>{{$category->no_of_members}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td>
                                    <div class="button-wrapper">
                                        <a class="btn-solid-reg page-scroll"
                                           href="{{url('/edit_category/'.$category->id)}}">Edit</a>
                                        <a class="btn-solid-leave page-scroll"
                                           href="{{url('/delete_category/'.$category->id)}}">Delete</a>
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


<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Currents</h1>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Money</th>
                            <th scope="col">Months</th>
                            <th scope="col">Members</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Functions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($currents as $current)
                            <tr>
                                <td>{{$current->id}}</td>
                                <td>{{$current->name}}</td>
                                <td>{{$current->money}}</td>
                                <td>{{$current->months}}</td>
                                <td>{{$current->users()->count()}}/{{$current->no_of_members}}</td>
                                <td>{{$current->due_date}}</td>
                                <td>{{$current->created_at}}</td>
                                <td>{{$current->updated_at}}</td>
                                <td>
                                    <div class="button-wrapper">
                                        <a class="btn-solid-reg page-scroll"
                                           href="{{url('/edit/'.$current->id)}}">Edit</a>
                                        <a class="btn-solid-leave page-scroll"
                                           href="{{url('/delete/'.$current->id)}}">Delete</a>
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


<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Users</h1>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">National ID</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            {{--                            <th scope="col">Functions</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            @if($user->email!='admin@admin.com')
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->national_id}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    {{--                                    <td>--}}
                                    {{--                                        <div class="button-wrapper">--}}
                                    {{--                                            <a class="btn-solid-reg page-scroll"--}}
                                    {{--                                               href="{{url('/edit/'.$category->id)}}">Edit</a>--}}
                                    {{--                                            <a class="btn-solid-leave page-scroll"--}}
                                    {{--                                               href="{{url('/edit/'.$category->id)}}">Delete</a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </td>--}}
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
<div class="slider-2" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align: center">Currents & Users</h1>
                <div class="outer">
                    <table class="table table-hover bg-light">
                        <thead>
                        <tr>
                            <th scope="col">Current ID</th>
                            <th scope="col">Current Name</th>
                            <th scope="col">User ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Money</th>
                            <th scope="col">Months to be paid</th>
                            <th scope="col">Is paid</th>
                            <th scope="col">Due Date</th>
                            {{--                            <th scope="col">Functions</th>--}}
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($currents as $current)
                            @foreach($current->users as $user)
                                @if($user!=null)
                                    <tr>
                                        <td>{{$current->id}}</td>
                                        <td>{{$current->name}}</td>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->pivot->money}}</td>
                                        <td>{{$user->pivot->months_left_to_be_paid}}</td>
                                        <td>{{$user->pivot->is_paid}}</td>
                                        <td>{{$current->due_date}}</td>
                                        {{--                                        <td>--}}
                                        {{--                                            <div class="button-wrapper">--}}
                                        {{--                                                <a class="btn-solid-reg page-scroll"--}}
                                        {{--                                                   href="{{url('/edit_category/'.$category->id)}}">Edit</a>--}}
                                        {{--                                                <a class="btn-solid-leave page-scroll"--}}
                                        {{--                                                   href="{{url('/delete_category/'.$category->id)}}">Delete</a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </td>--}}
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
@endsection
