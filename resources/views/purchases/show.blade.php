@extends('layouts.master')
@section('content')
@section('title' ,'انشاء فاتورة مشتريات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-center">
                <h3>فاتوره المشتريات
                    #{{$invoice->id}}
                </h3>
            </div>
            <div class="col-1">
                <a class="btn btn-success" onclick="window.print();" role="button">طباعه</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>المورد</td>
                        <td>{{$invoice->supplier->name}} </td>
                    </tr>
                    <tr>
                        <td>المخزن</td>
                        <td>{{$invoice->stock->name}} </td>
                    </tr>
                    <tr>
                        <td> التاريخ</td>
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
                    <th>المنتج</th>
                    <th>الكميه</th>
                    <th>الوحده</th>
                    <th> سعر الوحده</th>
                    <th> المجموع</th>



                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $vat_total = 0; ?>
                @foreach($invoice->products as $product)
                <?php $vat_total += $product->sub_vat; ?>
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$product->product->name}}</td>
                    <td>{{$product->qyt}}</td>
                    <td>{{$product->product->unit->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sub_total}}</td>

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
                        <td>اجمالي الفاتورة</td>
                        <td>  {{$invoice->total}} ريال </td>
                    </tr>

                    @if($invoice->discount > 0)
                    <tr>
                        <td> الخصم:</td>
                        <td>  {{$invoice->discount }} ريال</td>
                    </tr>
                    <tr>
                        <td> الاجمالي بعد الخصم:</td>
                        <td>  {{$invoice->total - $invoice->discount }} ريال</td>
                    </tr>
                    @endif
                    <tr>
                        <td> الضريبه: </td>
                        <td>  {{$invoice->vat_total}} ريال</td>
                    </tr>


                    <tr>
                        <td> صافي الفاتورة:</td>
                        <td>  {{$invoice->total - $invoice->discount + $invoice->vat_total}} ريال</td>
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
