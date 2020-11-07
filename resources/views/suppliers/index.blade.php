@extends('layouts.master')
@section('content')
@section('title' , __('messages.Suppliers') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Suppliers') }}</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/supplier/create')}}" role="button"> {{ __('messages.AddSuppliers') }} </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.phone') }} </th>
                <th>{{ __('messages.Title') }} </th>

                <th>{{ __('messages.product Settings') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($suppliers as $supplier)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <!-- id 	name 	phone 	address -->
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->phone}}</td>
                    <td>{{$supplier->address}}</td>

                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/supplier/show')}}/{{$supplier->id}}" role="button">{{ __('messages.Show') }} </a>

                        <a name="" id="" class="btn  btn-sm btn-warning" href="{{url('/supplier/edit')}}/{{$supplier->id}}" role="button">{{ __('messages.Modify') }} </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $suppliers->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
