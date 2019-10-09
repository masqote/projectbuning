@extends('layouts.template')
@section('content')
<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                      @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                      @if(\Session::has('alert-success'))
                            <div class="alert alert-success">
                                <div>{{Session::get('alert-success')}}</div>
                            </div>
                        @endif
                        @if(\Session::has('gagal'))
                            <div class="alert alert-danger">
                                <div>{{Session::get('gagal')}}</div>
                            </div>
                        @endif
                          <div class="user-heading round">
                              <a href="#">
                              @if($profile->file == null)
                              <img src="img/profile-avatar.jpg" alt="">
                              @endif
                                  <img src="foto/{{$profile->file}}" alt="">
                              </a>
                              <!-- <p style="margin-top:-10px;"><span style="color:black; opacity:1;  text-shadow: 0 0 3px white;">Change Photo</span></p> -->
                              <!-- <form action="/uploadPost" method="POST" enctype="multipart/form-data">
                              {{ csrf_field() }}  
                                              <p><div class="fileupload fileupload-new" data-provides="fileupload" style="color:black; margin-right:-30px;">
                                                <span class="btn btn-white btn-file">
                                                <span class="fileupload-new" ><i class="fa fa-paper-clip"></i> Change Picture</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="default" />
                                                </span>
                                                  <span class="fileupload-preview" style="margin-left:5px;"></span>
                                                  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                              </div></p>
                              </form> -->
                             
                                          
                             
                              <h1>{{$profile->name}}</h1>
                              <p>{{$profile->email}}</p>
                              <b style="color:black;">
                              @if(Session::get('role') == 1)
                              ( Master Administrator )
                              @elseif(Session::get('role') == 2)
                              ( Administrator )
                              @else
                              ( User )
                              @endif
                              
                              </b>
                              
                          </div>
                          <!-- <button type="button"  class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal">Edit Profile</button> -->
                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="/profile"> <i class="fa fa-user"></i> Profile</a></li>
                              <li><a href="profile-activity.html"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                              <li><a href="#myModal" data-toggle="modal" > <i class="fa fa-edit"></i> Edit profile</a></li>
                              <li><a href="#myModal1" data-toggle="modal" > <i class="fa fa-cog"></i> Reset Password</a></li>
                          </ul>

                      </section>
                  </aside>

                <!-- Modal Update Profile -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Edit Profile</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" action="/profileUpdate" method="post" enctype="multipart/form-data">
                                              {{ csrf_field() }}
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Your Name</label>
                                                      <input type="text" class="form-control" name="name" id="exampleInputEmail3" value="{{$profile->name}}" style="color:black;">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Email Address</label>
                                                      <input type="email" class="form-control" name="email" id="exampleInputPassword3" value="{{$profile->email}}" style="color:black;">
                                                  </div>
                                                  <div class="form-group">
                                                  <label>Profile Picture</label>
                                                    <br/>
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                            @if($profile->file == null)
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                            @endif
                                                                <img src="foto/{{$profile->file}}" alt="" /> 
                                                            </div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                            <div>
                                                            <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" name="file" class="default" value="{{$profile->file}}"/>
                                                            </span>
                                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                            </div>
                                                        </div>
                                                        
                                                   
                                                  </div>
                                                  
                                                  <button type="submit" class="btn btn-primary">Update</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <!-- Modal Reset Password -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal1" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Reset Password</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" action="/resetPassword" method="post">
                                              {{ csrf_field() }}
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Current Password</label>
                                                      <input type="password" class="form-control" name="current_password" id="exampleInputEmail3" placeholder="****" style="color:black;">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">New Password</label>
                                                      <input type="password" class="form-control" name="new_password" name="newpassword" id="exampleInputPassword3" placeholder="****" style="color:black;">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Password Confirmation</label>
                                                      <input type="password" class="form-control" name="new_password_confirmation" name="newpasswordconfirmation" id="exampleInputPassword3" placeholder="****"  style="color:black;">
                                                  </div>
                                                  <button type="submit" class="btn btn-primary">Update Password</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                  
            </section>
</section>

@endsection