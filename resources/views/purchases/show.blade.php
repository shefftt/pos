@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Purchase Invoiceitem') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-center">
                <h3> {{ __('messages.Purchase Invoiceitem') }}
                #{{$invoice->id}}
                </h3>
            </div>
            <div class="col-1">
                <a class="btn btn-success" onclick="window.print();" role="button"> {{ __('messages.Print') }}</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>{{ __('messages.Suppliers') }}</td>
                    <td>{{$invoice->supplier->name}} </td>
                </tr>
                <tr>
                    <td>{{ __('messages.Storesitem') }}</td>
                    <td>{{$invoice->stock->name}} </td>
                </tr>
                <tr>
                    <td> {{ __('messages.Date') }}</td>
                    <td>{{$invoice->created_at}} </td>
                </tr>

                </tbody>
            </table>
        </div>

        <hr>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('messages.product name') }}</th>
                <th>{{ __('messages.Quantity') }}</th>
                <th>  {{ __('messages.price') }}</th>
                <th> {{ __('messages.Total') }}</th>
                <th>{{ __('messages.product Unit') }}</th>
                <th>{{ __('messages.Tax') }}</th>
                <th> {{ __('messages.Sum Tax') }}</th>
                <th>{{ __('messages.product Settings') }}</th>


            </tr>
            </thead>
            <tbody>
                <?php $i = 1; $vat_total = 0; ?>
            @foreach($invoice->products as $product)
                <?php  $vat_total += $product->sub_vat; ?>
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$product->product->name}}</td>
                    <td>{{$product->qyt}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sub_total}}</td>
                    <td>{{$product->product->unit->unit_name}}</td>
                    <td>{{$product->vat}}</td>
                    <td>{{$product->sub_vat}}</td>
                    <td></td>
                   </tr>
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
                        <td>{{ __('messages.Tax') }}</td>
                        <td>{{ $vat_total}}</td>
                    </tr>
                    <tr>
                        <td> {{ __('messages.Total') }}</td>
                        <td>{{$vat_total + ($invoice->total)}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        <div class="card-footer">

        </div>
</div>
<script type="text/javascript">
    function auto_print() {
        window.print()
    }
</script>

@endsection
