{!! Form::model($model,[
    'route' => 'data.store',
    'method' =>'POST'
]) !!}

<div class="form-group">
    <label for="" class="control-label">Name</label>
   {!! Form::text('name',null, ['class'=>'form-control', 'id'=>'name']) !!}
</div>

<div class="form-group">
    <label for="" class="control-label">Description</label>
    {!! Form::textarea('desc', null, ['class'=>'form-control', 'id'=>'desc']) !!}
</div>
<div class="form-group">
    <label for="" class="control-label">Upload File</label>
    {!! Form::file('file', null, ['class'=>'form-control', 'id'=>'file']) !!}
</div>