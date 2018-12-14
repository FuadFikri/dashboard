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
                  </div>
                </div>
         </div>
         <div class="x_content">
             <div class="container">
                  <h2>Response</h2>

                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeResIndex">Response Sukses</a></li>
                    <li><a data-toggle="tab" href="#ResPenjelasanIndex">Penjelasan Response</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="homeResIndex" class="tab-pane fade in active">
                        <script src="https://gist.github.com/irsaiyan/6f4820adf202e3fdde8915221bd5b61a.js"></script>
                    </div>
                    <div id="ResPenjelasanIndex" class="tab-pane fade">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Komponen</th>
                              <th>Tipe</th>
                              <th>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>id</td>
                              <td>int</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>name</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>desc</td>
                              <td>text</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>file</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>url</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>thumbnail</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>created_at</td>
                              <td>timestamp</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>updated_at</td>
                              <td>timestamp</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>deleted_at</td>
                              <td>timestamp</td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
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
                  <h2>Contoh Request</h2>
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeShow">URL</a></li>
                    <li><a data-toggle="tab" href="#parshow">Parameter</a></li>
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
                      <script src="https://gist.github.com/irsaiyan/ea3f59d1d42f44ac13670d29cb71d7c0.js"></script>
                    </div>
                    <div id="ResPenjelasanShow" class="tab-pane fade">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Komponen</th>
                              <th>Tipe</th>
                              <th>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>id</td>
                              <td>int</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>name</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>desc</td>
                              <td>text</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>file</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>url</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>thumbnail</td>
                              <td>varchar</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>created_at</td>
                              <td>timestamp</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>updated_at</td>
                              <td>timestamp</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>deleted_at</td>
                              <td>timestamp</td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
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
