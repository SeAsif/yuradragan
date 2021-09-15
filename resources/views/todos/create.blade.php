@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  bg-primary text-white">{{ __('Add Todo') }}</div>

                <div class="card-body">
                     @include('flash.message')
                    <form method="POST" action="{{ route('todos.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description"  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description') }} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                @foreach(todos_status() as $value)
                                 <div class="form-check">
                                 <input type="radio" class="form-check-input {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{$value}}">
                                    <label class="form-check-label" for="flexCheckDefault"> {{$value}}</label>
                                </div>
                                @endforeach
                                  <label>
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <button type="reset" class="btn btn-default">
                                    {{ __('Clear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//auto locate on todos page when return success message 
 @if (Session::has('success'))
setTimeout( () => {
    window.location.href="{{route('todos')}}"; 
},3000)
@endif
</script>
@endsection
