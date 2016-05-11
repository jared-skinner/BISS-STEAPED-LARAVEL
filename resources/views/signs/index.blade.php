@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Sign Order
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Sign Form -->
                    <form action="/sign" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Sign Name -->
                        <div class="form-group">
                            <label for="sign-description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="sign-description" class="form-control">add description here</textarea>
                            </div>
                        </div>

                        <!-- Sign ordered-by -->
                        <div class="form-group">
                            <label for="sign-ordered-by" class="col-sm-2 control-label">Ordered By</label>
                            <div class="col-sm-10">
                                <input type="text" name="ordered_by" id="sign-ordered_by" class="form-control" value="{{ old('sign') }}">
                            </div>
                        </div>

                        <!-- Sign Route -->
                        <div class="form-group">
                            <label for="sign-route" class="col-sm-2 control-label">Route Name/#</label>
                            <div class="col-sm-10">
                                <input type="text" name="route" id="sign-route" class="form-control" value="{{ old('sign') }}">
                            </div>
                        </div>

                        <!-- Sign Brand -->
                        <div class="form-group">
                            <label for="sign-brand" class="col-sm-2 control-label">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" name="brand" id="sign-brand" class="form-control" value="{{ old('sign') }}">
                            </div>
                        </div>

                        <!-- Sign Price -->
                        <div class="form-group">
                            <label for="sign-price" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" id="sign-price" class="form-control" value="{{ old('sign') }}">
                            </div>
                        </div>                        

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Sign
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  

<!-- Current Signs -->
            @if (count($signs) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Signs
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Description</th>
                                <th>Ordered By</th>
                                <th>Route#/Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($signs as $sign)
                                    <tr>
                                        <td class="table-text"><div>{{ $sign->description }}</div></td>
                                        <td class="table-text"><div>{{ $sign->ordered_by }}</div></td>
                                        <td class="table-text"><div>{{ $sign->route }}</div></td>
                                        <td class="table-text"><div>{{ $sign->brand }}</div></td>
                                        <td class="table-text"><div>{{ $sign->price }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/sign/{{ $sign->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-sign-{{ $sign->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
