@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Products') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Products') }}</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/product/create')}}" role="button">   {{ __('messages.Addaproduct') }} </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table"  id="DataTable" >
            <thead>
                <tr>
                    <th>#</th>
                    <th> {{ __('messages.Image') }}</th>
                    <th>  {{ __('messages.product name') }}</th>
                    <th>  {{ __('messages.Purchasing price') }}</th>
                    <th> {{ __('messages.selling price') }}</th>
                    <th> {{ __('messages.Category') }}</th>
                    <th> {{ __('messages.product Unit') }}</th>
                    <th> {{ __('messages.barcode') }}</th>
                    <th> {{ __('messages.Tax') }}</th>
                    <th> {{ __('messages.product Settings') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($products as $product)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="col-1">
                        <img class="rounded w-80" src="{{url('/image/')}}/{{$product->image}}">
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->purchase_price}}</td>
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->unit->name}}</td>
                    <td>{{$product->barcode}}</td>
                    <td>{{$product->vat}}</td>
                    <td>
                        @if($product->status==false)
                        <a name="" id="" class="btn  btn-sm btn-danger" href="{{url('product/toggleStatus')}}/{{$product->id}}" role="button">{{ __('messages.Energizing') }}</a>
                        @else
                        <a name="" id="" class="btn  btn-sm btn-success" href="{{url('product/toggleStatus')}}/{{$product->id}}" role="button">{{ __('messages.turning off') }}</a>

                        @endif

                     <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/product/edit/')}}/{{$product->id}}" role="button">{{ __('messages.Modify') }}</a>
                        <a name="" id="" class="btn  btn-sm btn-success" href="{{url('/product')}}/{{$product->id}}" role="button">{{ __('messages.Show') }}</a>
                    <a  name="" id="" class="btn  btn-sm btn-warning" target="_blank"  href="{{url('/barcode/')}}/{{$product->id}}" role="button"> {{ __('messages.Barcode printing') }}</a>

                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $products->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
