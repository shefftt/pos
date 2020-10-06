@extends('layouts.master')
@section('content')
@section('title' ,'الحسابات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>الحسابات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/account/create')}}" role="button">اضافة حساب </a>

            </div>
        </div>

    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الحساب</th>
                <th> نوع الحساب </th>

                <th>الضبط</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($accounts as $account)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$account->name}}</td>
                    <td>{{$account->type}}</td>

                    <td>
                        <a name="" id="" class="btn  btn-sm btn-danger" href="#" role="button">توقيف</a>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="#" role="button">عرض</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{$accounts->links()}}
            </div>
        </div>
    </center>
</div>

@endsection
