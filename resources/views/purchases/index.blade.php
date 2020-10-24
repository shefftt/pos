@extends('layouts.master')
@section('content')
@section('title' ,'فواتير المشتريات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>فواتير المشتريات</h6>
            </div>

            <div class="col text-left">
            <div class="form-group">
              <input type="text"
                class="form-control" name="" id="" aria-describedby="helpId" placeholder="رقم الفاتوره">
            </div>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modelId">
                    بحث
                </button>
                <a class="btn btn-dark" href="{{url('/purchase/create')}}" role="button"> انشاء فاتوره</a>


            </div>
        </div>

        <div  class="dataTables_filter"><label>بحث : <input type="search"  id="search" class="form-control form-control-sm" placeholder="" aria-controls="example1" name="search"></label>
        </div>
    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المورد</th>
                    <th> المخزن</th>
                    <th> المجموع</th>
                    <th>التاريخ</th>
                    <th> الدفع</th>
                    <th> رقم الفاتوره</th>
                    <th> التاريخ</th>
                    <th>الضبط</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($purchases as $purchase)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$purchase->supplier->name}}</td>
                    <td>{{$purchase->stock->name}}</td>
                    <td>{{$purchase->total}}</td>
                    <td>{{$purchase->created_at}}</td>

                    <td>
                        @if($purchase->transaction->sum('amount') == $purchase->total)
                        <button class="btn">
                            تم الدفع <span class="badge badge-primary"></span>
                        </button>
                        @else
                        <?php $amount = $purchase->total - $purchase->transaction->sum('amount'); ?>
                        <purchase-btn amount="{{$amount}}" />
                        @endif
                    </td>

                    <td>{{$purchase->invoice_number}}</td>
                    <td>{{$purchase->created_at}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{url('/purchase/')}}/{{$purchase->id}}" role="button">عرض</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $purchases->links() }}
            </div>
        </div>
    </center>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">البحث عن فاتوره</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="invoice_number">رقم الفاتورة </label>
                                <input type="text" class="form-control" name="invoice_number" id="invoice_number" aria-describedby="helpId" placeholder="رقم الفاتوره">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <button type="submit" class="btn btn-primary">بحث</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </div>
            </div>
        </div>

@endsection

