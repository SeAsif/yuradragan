@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             @include('flash.message')
            <div class="card">
                <div class="card-header bg-primary">
                    <span   class="float-left text-white">{{ __('Todos') }}</span>
                    <a href="{{ route('todos.create') }}" class="btn btn-success float-right">{{ __('+ Add Todo') }}</a>
                </div>

                <div class="card-body">
                <!-- Table Start-->
                   <table class="table table-sm">

                   <!-- Table head-->
                    <thead>
                        <tr>
                            <th>{{ __('Sr#') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                   <!-- Table head end-->

                    <!--start body-->
                    <tbody>

                         @foreach($data as $key=>$value)
                        <tr>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->status }}</td>
                            <td>
                                <a href="{{route('todos.edit', encrypt($value->id))}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('todos.show',encrypt($value->id))}}" class="btn btn-success">View</a>
                                <a href="{{route('todos.destroy',encrypt($value->id))}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                         @endforeach

                    </tbody>
                    <!--end body-->
                </table>
                <!-- Table End-->

                <!-- Pagination-->
                <div class="d-flex justify-content-center">
                {{ $data->links() }}
                 </div>
                <!-- End Pagination-->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
