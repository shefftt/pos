@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Customers') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6> {{ __('messages.Customers') }}</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/customer/create')}}" role="button">  {{ __('messages.Add Customers') }}</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table"  id="DataTable" >
            <thead>
                <tr>
                    <th>#</th>
                    <th> {{ __('messages.Client') }}</th>
                    <th>   {{ __('messages.phone') }}</th>
                    <th> {{ __('messages.Title') }}</th>
                    <th> {{ __('messages.Case') }}</th>
                    <th> {{ __('messages.product Settings') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($customers as $customer)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                        @if($customer->status==false)

                        <span class="label badge label-sm label-danger">
                             {{ __('messages.Steeingdone') }}
                        </span>

                        @else
                        <span class="label badge label-sm label-success">
                            {{ __('messages.active') }}
                        </span>
                        @endif
                    </td>
                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('customer/toggleStatus')}}/{{$customer->id}}" role="button"> {{ __('messages.turning off') }}</a>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/customer/show')}}/{{$customer->id}}" role="button"> {{ __('messages.Show') }}</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{$customers->links()}}
            </div>
        </div>
    </center>
</div>

@endsection
