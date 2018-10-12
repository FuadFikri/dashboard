{!! Form::model($model,[
    'route' => 'data.store',
    'method' =>'POST'
]) !!}

<div class="form-group">
    <label for="" class="control-label">Name</label>
   {!! Form::text('name',null, ['class'=>'form-control', 'id'=>'name']) !!}
</div>

<div class="form-group">
    <label for="" class="control-label">email</label>
    {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
</div>