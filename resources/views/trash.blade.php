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
@push('scripts2')
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

        function restore(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {
              $.ajax({
                  url : "{{ url('trash') }}" + '/' + id + '/restore',
                  type : "POST",
                  data : {'_method' : 'PATCH','_token' : csrf_token},
                  success : function(data) {
                      table.ajax.reload();
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          });
        }

       function permanentdelete(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Yes, delete it!'
          }).then(function () {
              $.ajax({
                  url : "{{ url('trash/') }}" + id ,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      table.ajax.reload();
                      swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          });
        }  
    </script>        
@endpush
