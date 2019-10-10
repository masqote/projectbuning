@extends('layouts.template')
@section('content')
<!--main content start-->
<section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Data Project
                              <button type="submit" style="position:absolute; right:30px; top:1px; width:200px; font-size:20px;" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Project</button>
                          </header>
                          <div class="panel-body">
                                <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>Rendering engine</th>
                                          <th>Browser</th>
                                          <th>Platform(s)</th>
                                          <th class="hidden-phone">Engine version</th>
                                          <th class="hidden-phone">CSS grade</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <tr class="gradeX">
                                          <td>Trident</td>
                                          <td>Internet
                                              Explorer 4.0</td>
                                          <td>Win 95+</td>
                                          <td class="center hidden-phone">4</td>
                                          <td class="center hidden-phone">X</td>
                                      </tr>
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                          <th>Rendering engine</th>
                                          <th>Browser</th>
                                          <th>Platform(s)</th>
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

                                          <form>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Project Name</label>
                                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Project Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Periode</label>
                                                        <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                                                            <input type="text"  size="16" class="form-control">
                                                                <span class="input-group-btn add-on">
                                                                    <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label for="inputEmail4">Destination</label>
                                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Destination" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Schedule</label>
                                                        <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy" >
                                                            <input type="text" class="form-control dpd1" name="from" autocomplete="off">
                                                            <span class="input-group-addon">To</span>
                                                            <input type="text" class="form-control dpd2" name="to"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Remarks</label>
                                                        <!-- <input type="text" class="form-control" id="inputEmail4" placeholder="Project Name"> -->
                                                        <textarea class="form-control" autocomplete="off" name="remarks"></textarea>
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
                                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Destination" autocomplete="off">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Schedule</label>
                                                        <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy" >
                                                            <input type="text" class="form-control dpd1" name="from" autocomplete="off">
                                                            <span class="input-group-addon">To</span>
                                                            <input type="text" class="form-control dpd2" name="to"  autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Remarks</label>
                                                        <!-- <input type="text" class="form-control" id="inputEmail4" placeholder="Project Name"> -->
                                                        <textarea class="form-control" autocomplete="off" name="remarks"></textarea>
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
                  "aaSorting": [[ 0, "desc" ]]
              } );
          } );
      </script>
@endsection