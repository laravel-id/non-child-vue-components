@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    <search></search>
                    <user-index limit="20"></user-index>
                </div>

                <div class="panel-footer">
                    <pagination></pagination>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
