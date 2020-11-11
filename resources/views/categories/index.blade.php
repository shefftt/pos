@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Classifications'))

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Classifications') }}</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/category/create')}}" role="button">{{ __('messages.Add a classification') }}</a>

            </div>
        </div>

    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
                <tr>

                    <th>#</th>
                    <th>{{ __('messages.Category name') }}</th>
                    <th>{{ __('messages.Type of classification') }}</th>
                    <th>{{ __('messages.product Settings') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($categories as $category )
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @if(isset($category->sub->name))
                        {{$category->sub->name}}
                        @else
                        تصنيف رئيسيى
                        @endif
                    </td>
                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/category/')}}/{{$category->id}}" role="button">{{ __('messages.Show') }}</a>
                        <a name="" id="" class="btn  btn-sm btn-warning" href="{{url('/category/edit/')}}/{{$category->id}}" role="button">{{ __('messages.Modify') }}</a>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
