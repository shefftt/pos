@extends('layouts.master')
@section('content')
@section('title' ,'طرق الدفع')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>طرق الدفع</h6>
            </div>
            <div class="col text-left">
                <button type="button" class="btn btn-secondary btn-md" data-toggle="modal" data-target="#paymentsModel">
                    اضافة طريقه دفع
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الحالة </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($payments as $payment)
                <tr>

                    <td scope="row">{{$i++}}</td>

                    <td>{{$payment->name}}</td>
                    <td>
                        @if($payment->status == 1)

                        <a class="btn  btn-sm btn-success" href="{{url('/payments/toggle/')}}/{{$payment->id}}" role="button">نشط</a>
                        @else
                        <a class="btn  btn-sm btn-danger" href="{{url('/payments/toggle/')}}/{{$payment->id}}" role="button">متوقف</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="paymentsModel" tabindex="100" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <form action="{{url('payments/create')}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">اضافة طريقة دفع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="">اسم طريقة الدفع </label>
                                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
