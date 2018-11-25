@extends('templates.master')
@section('konten')
<!-- page content -->
<div class="right_col" role="main">
 <div class="">
   <div class="page-title">
     <div class="title_left">
     </div>
   </div>

   <div class="clearfix"></div>

   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
         <div class="x_title">
           <h2 id="Index">Index</h2>
           <ul class="nav navbar-right">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
             </li>
           </ul>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">
             <div class="container">
                  <h2>Ringkasan</h2>
                  <p>Method "Index" untuk melihat item yang berada di database server.</p>

                  <h2> Contoh Request</h2>

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeIndex">URL</a></li>
                    <li><a data-toggle="tab" href="#ReqIndex">Contoh Request</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="homeIndex" class="tab-pane fade in active">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Method</th>
                                    <th>URL</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>GET</td>
                                    <td>http://model3d.herokuapp.com/api/assets</td>
                                  </tr>
                                </tbody>
                              </table>
                    </div>
                    <div id="ReqIndex" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>
                </div>
         </div>
         <div class="x_content">
             <div class="container">
                  <h2>Response</h2>

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeResIndex">Response Sukses</a></li>
                    <li><a data-toggle="tab" href="#ResGagalIndex">Response Gagal</a></li>
                    <li><a data-toggle="tab" href="#ResPenjelasanIndex">Penjelasan Response</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="homeResIndex" class="tab-pane fade in active">
                        <script src="https://gist.github.com/irsaiyan/6f4820adf202e3fdde8915221bd5b61a.js"></script>
                    </div>
                    <div id="ResGagalIndex" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="ResPenjelasanIndex" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>
                </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="">
   <div class="page-title">
     <div class="title_left">
     </div>
   </div>

   <div class="clearfix"></div>

   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
         <div class="x_title">
           <h2 id="Show">Show</h2>
           <ul class="nav navbar-right">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
             </li>
           </ul>
           <div class="clearfix"></div>
         </div>
         <div class="x_content">
             <div class="container">
                  <h2>Ringkasan</h2>
                  <p>Method "Show" untuk melihat detail item yang dipilih.</p>

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeShow">URL</a></li>
                    <li><a data-toggle="tab" href="#parshow">Parameter</a></li>
                    <li><a data-toggle="tab" href="#ReqShow">Contoh Request</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="homeShow" class="tab-pane fade in active">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Method</th>
                                    <th>URL</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>GET</td>
                                    <td>http://model3d.herokuapp.com/api/asset/{id}</td>
                                  </tr>
                                </tbody>
                              </table>
                    </div>
                    <div id="parshow" class="tab-pane fade">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Method</th>
                              <th>Parameter</th>
                              <th>Wajib</th>
                              <th>Tipe</th>
                              <th>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>GET</td>
                              <td>id</td>
                              <td>Iya</td>
                              <td>int</td>
                              <td>ID item</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                    <div id="ReqShow" class="tab-pane fade">
                      <h3>Menu 2</h3>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                  </div>
                </div>
         </div>
         <div class="x_content">
             <div class="container">
                  <h2>Response</h2>

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeResShow">Response Sukses</a></li>
                    <li><a data-toggle="tab" href="#ResGagalShow">Response Gagal</a></li>
                    <li><a data-toggle="tab" href="#ResPenjelasanShow">Penjelasan Response</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="homeResShow" class="tab-pane fade in active">
                              <script src="https://gist.github.com/irsaiyan/98b11c97cbee15cb2f3a607b91c7ef36.js"></script>
                    </div>
                    <div id="ResGagalShow" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="ResPenjelasanShow" class="tab-pane fade">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                  </div>
                </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<!-- /page content -->
@endsection
