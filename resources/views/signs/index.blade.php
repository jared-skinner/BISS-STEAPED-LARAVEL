@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
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
                            <label for="sign-description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="sign-description" class="form-control">add description here</textarea>
                            </div>
                        </div>

                        <!-- Sign ordered-by -->
                        <div class="form-group">
                            <label for="sign-ordered-by" class="col-sm-3 control-label">Ordered By</label>
                            <div class="col-sm-9">
                                <input type="text" name="ordered-by" id="sign-ordered-by" class="form-control" value="{{ old('sign') }}">
                            </div>
                        </div>

                        <!-- Sign Route -->
                        <div class="form-group">
                            <label for="sign-route" class="col-sm-3 control-label">Route Name/#</label>
                            <div class="col-sm-9">
                                <input type="text" name="route" id="sign-route" class="form-control" value="{{ old('sign') }}">
                            </div>
                        </div>

                        <!-- Sign Brand -->
                        <div class="form-group">
                            <label for="sign-brand" class="col-sm-3 control-label">Brand</label>
                            <div class="col-sm-9">
                                <input type="text" name="brand" id="sign-brand" class="form-control" value="{{ old('sign') }}">
                            </div>
                        </div>

                        <!-- Sign Price -->
                        <div class="form-group">
                            <label for="sign-price" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9">
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
        </div>
    </div>
@endsection
