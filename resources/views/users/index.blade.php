@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Users') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Users') }}</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/user/create')}}" role="button">   {{ __('messages.Add Users') }}</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table"  id="DataTable" >
            <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>  {{ __('messages.E-mail') }}</th>

                <th>{{ __('messages.stock') }}</th>
                <th>{{ __('messages.product Settings') }}</th>

            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <!-- id 	name 	phone 	address -->
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->stock->name}}</td>


                    <td>


    @if (($user->status)==1)

                             <a name="" id="" class="btn  btn-sm btn-danger" href="{{url('/user/cancel')}}/{{$user->id}}" role="button">{{ __('messages.turning off') }}</a>

                        @else
                            <a name="" id="" class="btn  btn-sm btn-success" href="{{url('/user/activate')}}/{{$user->id}}" role="button">{{ __('messages.Energizing') }}</a>

                        @endif




                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $users->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
