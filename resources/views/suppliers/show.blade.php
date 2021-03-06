@extends('layouts.master')
@section('content')
@section('title' ,'عرض مورد')
<div class="card text-right">
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <img src="https://www.learning.uclg.org/sites/default/files/styles/featured_home_left/public/no-user-image-square.jpg?itok=PANMBJF-" class="img-thumbnail" alt="">
            </div>
            <div class="col-4">
                <table class="table img-thumbnail">
                    <tbody>
                        <tr>
                            <td>{{ __('messages.name') }}</td>
                            <td>{{$supplier->name}} </td>
                        </tr>
                        <tr>
                            <td>{{ __('messages.phone') }} </td>
                            <td>{{$supplier->phone}} </td>
                        </tr>
                        <tr>
                            <td> {{ __('messages.balance') }} </td>
                            <td>{{$supplier->balance}} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card">

    <div class="card-body">
        <div class="col-12 col-sm-6 col-lg-12" style="direction: rtl;">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">


                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="true">{{ __('messages.Invoices') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">{{ __('messages.Payments') }} </a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">

                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> {{ __('messages.invoice number') }} </th>
                                        <th>{{ __('messages.amount') }} </th>
                                        <th>{{ __('messages.Date') }} </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($supplier->purchase_invoice as $purchase_invoices)
                                    @foreach($purchase_invoices->transaction as  $transaction)
                                    <tr>
                                        <td scope="row">{{$i++}}</td>
                                        <td>{{$transaction->transactionable_id}}</td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>{{$transaction->created_at}}</td>


                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade active show" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th> {{ __('messages.Storesitem') }}</th>
                                            <th>  {{ __('messages.amount paid') }}</th>
                                            <th> {{ __('messages.Total') }}</th>

                                            <th>{{ __('messages.product Settings') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($invoices as $invoice)
                                        <tr>
                                            <td scope="row">{{$i++}}</td>



                                            <td>{{$invoice->stock->name}}</td>
                                            <td>{{$invoice->transaction->sum('amount')}}</td>
                                            <td>{{$invoice->total}}</td>


                                            <td>
                                                <a class="btn  btn-sm btn-primary" href="{{url('/purchase/')}}/{{$invoice->id}}" role="button">{{ __('messages.Show') }}</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="card-footer">
                                    <div class="col-md-4">
                                        {{ $invoices->links() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>





        @endsection
