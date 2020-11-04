@extends('layouts.master')
@section('content')
@section('title' ,' فاتورة مبيعات ')

        <hr>
<table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('product name') }}</th>
                    <th>  {{ __('messages.Quantity') }}</th>
                    <th>{{ __('messages.Quantity') }}</th>
                    <th> {{ __('messages.price') }}</th>
                    <th> {{ __('messages.product Unit') }}</th>
                    <th> {{ __('messages.Tax') }}</th>
                    <th> {{ __('messages.Sum Tax') }}</th>
                    <th> {{ __('messages.Total') }}</th>

                </tr>
            </thead>
    <div class="col-1">
        <a class="btn btn-success" onclick="window.print();" role="button">{{ __('messages.Print') }}</a>
    </div>
    <br>
            <tbody>
                <?php $i = 1;
                $vat_total = 0; ?>
                @foreach($invoice->products as $product)
                <?php $vat_total += $product->sub_vat; ?>
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$product->product->name}}</td>
                    <td>{{$product->qyt}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->product->unit->unit_name}}</td>
                    <td>{{$product->vat}}</td>
                    <td>{{$product->sub_vat}}</td>
                    <td>{{$product->sub_total}}</td>
                    @endforeach
            </tbody>
        </table>



        <hr>
        <div class="col-md-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>{{ __('messages.Total') }}</td>
                        <td>{{$invoice->total}} </td>
                    </tr>
                    <tr>
                        <td> {{ __('messages.Tax') }}</td>
                        <td>{{ $vat_total}}</td>
                    </tr>
                    <tr>
                        <td> {{ __('messages.total summation') }}</td>
                        <td>{{$vat_total + ($invoice->total)}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">

    </div>
</div>

@endsection
