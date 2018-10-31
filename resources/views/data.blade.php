@extends('templates.master')
@section('konten')
<div class="right_col" role="main">
<!-- top tiles -->
<div class="row tile_count">
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total Item</span>
    <div class="count">2500</div>
    <span class="count_bottom"><i class="green">4% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-clock-o"></i> Item Downloaded</span>
    <div class="count">123.50</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
  </div>
  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Item accessed</span>
    <div class="count green">2,500</div>
    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
  </div>
</div>
<!-- /top tiles -->
    <div class="">
           <div class="clearfix"></div>
     <div class="row">
    <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"> Assets
          <a onclick="addForm()" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create "><i class="icon-plus"></i> Create</a>
      </h3>
    </div>
        <div class="panel-body">
            <table id="dataTable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="20%">Name</th>
                        <th width="40%">Description</th>
                        <th width="10%"></th>
                        <th> </th>
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
@include('form')
{{-- @include('preview') --}}
@endsection
@push('scripts')
    <script>
         var table = $('#dataTable').DataTable({
                      processing: true,
                      serverSide: true,
                      ajax: "{{ route('tables.data') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'desc', name: 'desc'},
                        {data: 'show_file', name: 'show_file'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
            });

   function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Asset');
      }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('data') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Assets');

            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#desc').val(data.desc);
            $('#file').val(data.file);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

    function deleteData(id){
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
                  url : "{{ url('data') }}" + '/' + id,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token, permanent: false},
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


    $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('data') }}";
                    else url = "{{ url('data') . '/' }}" + id;
                    $.ajax({
                        url : url,
                        type : "POST",
                        // data : $('#modal-form form').serialize(),  =>tdk cocok untuk upload file
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });

        });  

        function preview(id){
            
        }

    </script>
@endpush
