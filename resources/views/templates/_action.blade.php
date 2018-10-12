<a href="{{ $url_show }}" class="btn btn-show" title="Detail: {{ $model->name }}"><i class="fa fa-eye text-primary" ></i></a> | 
<a href="{{ $url_edit }}" class="modal-show edit" title="Edit {{ $model->name }}"><i class="fa fa-pencil text-inverse"></i></a> | 
<a href="{{ $url_destroy }}" class="btn btn-delete" title="{{ $model->name }}"><i class="fa fa-trash text-danger"></i></a>