@extends('templates.master')
@section('konten')
<div class="right_col" role="main">
    <div class="">
           <div class="clearfix"></div>
     <div class="row">       
    <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Augmented Reality Assets
          <a href="{{ route('data.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create User"><i class="icon-plus"></i> Create</a>
      </h3>
    </div>
        <div class="panel-body">
            <table id="dataTable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th id="file">File</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
               
            </table>
        </div>
</div>
</div>
</div>
</div>

@endsection
@push('scripts')
    <script>
        $('#dataTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.data') }}",
            columns: [
                {data: 'DT_Row_Index', name:'id'},
                {data: 'name', name:'name'},
                {data: 'file', name:'file'},
                {data: 'desc', name:'desc'},
                {data: 'action', name:'_action'},
                
            ]
        });
    </script>
@endpush
