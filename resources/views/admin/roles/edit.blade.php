@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
<div class="role-permission-list ">
    <div class="row">
        <div class="col-md-6">
            <span>1) Create - Has the right to create this model <i class="fa fa-plus"></i> </span><br>

        </div>
        <div class="col-md-6">
            <span>2) Edit - Has the right to edit this model <i class="fa fa-edit"></i> </span><br>

        </div>
        <div class="col-md-6">
            <span>3) List - Has the right to view this model <i class="fa fa-eye"></i> </span><br>

        </div>
        <div class="col-md-6">
            <span>4) Delete - Has the right to delete this model <i class="fa fa-trash"></i> </span><br>

        </div>
    </div>
</div>

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="row">
        <strong>Permission:</strong>
        @foreach($permission as $value)
            <div class="col-3">
                <label style="font-size: 20px;">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                    {{ \Str::title(str_replace('-' , ' ', $value->name)) }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
