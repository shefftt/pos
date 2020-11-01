@extends('layouts.master')
@section('content')
@section('title' ,'اعدادات النظام')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>البيانات</h6>
            </div>
            <div class="col text-left">

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th> الشعار</th>
                    <th>اسم المحل</th>
                    <th>العنوان</th>
                    <th> الهاتف</th>
                    <th>الضبط</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>
                        <img src="{{url('/image/logo.png')}}" height="50px" class="rounded float-right" alt="logo">
                    </td>
                    <td>{{$setting->name}}</td>
                    <td>{{$setting->address}}</td>
                    <td>{{$setting->phone}}</td>

                    <td>
                        <a class="btn btn-sm btn-primary" href="{{url('/settings/')}}/edit/{{$setting->id}}" role="button">تعديل</a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
