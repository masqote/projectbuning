@extends('layouts.template')
@section('content')
<!--main content start-->
<style>

</style>
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          @if(\Session::has('alert-success'))
                                <div class="alert alert-success">
                                    <div>{{Session::get('alert-success')}}</div>
                                </div>
                            @endif
                              Data Project
                              <button type="submit" style="position:absolute; right:30px; top:1px; width:200px; font-size:20px;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Project</button>
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Responsible</th>
                                          <th>Project Name</th>
                                          <th>Periode</th>
                                          <th class="hidden-phone">Engine version</th>
                                          <th class="hidden-phone">CSS grade</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @php
                                        $no = 1;
                                      @endphp
                                      @foreach($project as $row)
                                      <tr class="gradeX">
                                          <td>{{$no++}}</td>
                                          <td>{{$row->email_project}}</td>
                                          <td>{{$row->name_of_project}}</td>
                                          <td>{{  date('Y - M', strtotime($row->month_of_project)) }}</td>
                                          <td class="center hidden-phone">4</td>
                                          <td class="center hidden-phone">X</td>
                                      </tr>
                                      @endforeach
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>No</th>
                                          <th>Responsible</th>
                                          <th>Project Name</th>
                                          <th>Periode</th>
                                          <th class="hidden-phone">Engine version</th>
                                          <th class="hidden-phone">CSS grade</th>
                                      </tr>
                                      </tfoot>
                          </table>
                                </div>
                          </div>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>

      <!-- Modal Update Profile -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Project Schedule</h4>
                                          </div>
                                          <div class="modal-body">

                                          <form action="/projectPost" method="post">
                                          {{ csrf_field() }}
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Project Name</label>
                                                        <input type="text" class="form-control" name="name_of_project" id="inputEmail4" placeholder="Project Name" style="color:black;" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Periode</label>
                                                        <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/dd/yyyy" data-date="now()"  class="input-append date dpMonths">
                                                            <input type="text" name="month_of_project" size="16"   style="color:black;" required class="form-control">
                                                                <span class="input-group-btn add-on">
                                                                    <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4">Destination</label>
                                                        <input type="text" class="form-control"  style="color:black;" required name="destination_project[]" id="inputEmail4" placeholder="Destination" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Schedule</label>
                                                        <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy" >
                                                            <input type="text" class="form-control dpd1"  style="color:black;" required name="start_date_project[]" autocomplete="off">
                                                            <span class="input-group-addon">To</span>
                                                            <input type="text" class="form-control dpd2"  style="color:black;" required name="end_date_project[]"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Remarks</label>
                                                        <!-- <input type="text" class="form-control" id="inputEmail4" placeholder="Project Name"> -->
                                                        <textarea class="form-control" autocomplete="off"  style="color:black;" required name="remarks_project[]"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="inputEmail4">Project</label>
                                                        <button type="button" id="somebutton" class="btn btn-success">+</button>
                                                    </div>
                                                </div>
                                                <div id="add_field">
                                                    
                                                </div>
                                                
                                                
                                                    <input type="submit" value="Submit" class="btn btn-primary"/>
                                                
                                            </form>

                                          </div>

                                      </div>
                                  </div>
                              </div>
      <!--main content end-->
      <script src="js/jquery-1.8.3.min.js"></script>
      <script src="js/advanced-form-components.js"></script>
      
      <script>
       $("#somebutton").click(function () {
        $("#add_field").append(`
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4">Destination</label>
                                                        <input type="text" class="form-control" name="destination_project[]"  style="color:black;" required id="inputEmail4" placeholder="Destination" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Schedule</label>
                                                        <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy" >
                                                            <input type="text"  style="color:black;" required class="form-control dpd1" name="start_date_project[]" autocomplete="off">
                                                            <span class="input-group-addon">To</span>
                                                            <input type="text"  style="color:black;" required class="form-control dpd2" name="end_date_project[]"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Remarks</label>
                                                        <!-- <input type="text" class="form-control" id="inputEmail4" placeholder="Project Name"> -->
                                                        <textarea class="form-control"  style="color:black;" required autocomplete="off" name="remarks_project[]"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label for="inputEmail4">Project</label>
                                                        <button type="button" id="somebutton" class="btn btn-danger del">-</button>
                                                    </div>
                                                </div>
        `);
        });
        // Func Remove Field Tambahan
            $('#add_field').on('click','.del',function() {
                $(this).fadeOut("1000", function(){
                $(this).parent().parent().remove();
                });     
            });
      
      </script>
      <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

 
  </script>
      <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 0, "asc" ]]
              } );
          } );
      </script>
@endsection