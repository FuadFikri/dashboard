@extends('templates.master')
@section('konten')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">       
            <div class="panel panel-primary">
             <div class="panel-heading">
                
            </div>
            <div class="panel-body">
                <table id="trashTable" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="20%">Name</th>
                            <th width="40%">Description</th>
                            <th width="10%"></th>
                            <th  ></th>
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
         var table = $('#trashTable').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: "{{ route('trash_API') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'desc', name: 'desc'},
                         {data: 'show_file', name: 'show_file'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
            });
    </script>        
@endpush
