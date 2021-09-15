@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  bg-primary text-white">{{ __('View Todo') }}</div>

                <div class="card-body">
                        <input type="hidden" value="{{$data->id}}" name="id">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" readonly type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $data->title }}"  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" readonly class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ $data->description }} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                @foreach(todos_status() as $value)
                                 <div class="form-check">
                                 <input type="radio" class="form-check-input {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{$value}}" {{$data->status==$value? "checked":""}} disabled>
                                    <label class="form-check-label" for="flexCheckDefault"> {{$value}}</label>
                                </div>
                                @endforeach
                                  <label>
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="javascript:void(0);" onclick="window.location.href='{{route('todos')}}';"  class="btn btn-default">
                                    {{ __('Go Back') }}
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
