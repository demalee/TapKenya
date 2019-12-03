@extends('layouts.admindashboard')

@section('breadcrumb')
    <a class="btn-outline-success" href="{{ route('programmes.index') }}" style="padding: 7px;">Back</a>
@endsection

@section('stuff')
      <div class="content">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.messages')
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{ asset('/storage/cover_images/'.$programme->cover_image) }}" alt="..." style="width: 100%;">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    {{-- <img class="avatar border-gray" src="{{ asset('user-dashboard-assets/img/mike.jpg')}}" alt="..."> --}}
                    <br>
                    <br>
                    <br>
                    <br>
                    <h5 class="title">{{ $programme->programme_name }}</h5>
                    
                     
                  </a>
                </div>
                
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 ml-auto">
                      <h5>{{ count($courses) }}
                        <br>
                        <small>Courses</small>
                      </h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                      <h5>{{ count($enrollments) }}
                        <br>
                        <small>Students</small>
                      </h5>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Instructors</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  
                  {{-- @foreach ($courses as $course) --}}
                  @if (count($teachers) > 0)
                    @foreach ($teachers as $teacher)
                        {{-- @if ($course->main_instructor == $instructor->id) --}}
                            <li>
                                <div class="row">
                                  <div class="col-md-2 col-2">
                                    <div class="avatar">
                                      <img src="{{ asset('/storage/cover_images/'.$teacher->cover_image) }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                  </div>
                                  <div class="col-md-7 col-7">
                                    {{ $teacher->fullname }}
                                    <br />
                                    <span class="text-muted">
                                      <small>Offline</small>
                                    </span>
                                  </div>
                                  <div class="col-md-3 col-3 text-right">
                                    <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope" style="top: 50%;"></i></button>
                                  </div>
                              </div>
                            </li>
                        {{-- @endif --}}
                    @endforeach  
                  @else
                    <div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                      </button>
                      <span>
                        <b>Information - </b> No instructors have been assigned to courses in this programme at the moment</span>
                    </div>
                  @endif
                        
                  {{-- @endforeach --}}
                    
                  {{-- <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="{{ asset('user-dashboard-assets/img/faces/joe-gardner-2.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Cicero
                        <br />
                        <span class="text-success">
                          <small>Available</small>
                        </span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="{{ asset('user-dashboard-assets/img/faces/clem-onojeghuo-2.jpg')}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Aristotle
                        <br />
                        <span class="text-danger">
                          <small>Busy</small>
                        </span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li> --}}
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user"  style="padding: 1rem;">
              <div class="card-header">
                <h5 class="card-title">Edit Programme</h5>
              </div>
              <div class="card-body">
                {!! Form::open(['action' => ['Admin\ProgrammesController@update', $programme->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                              {{ Form::Label('programme_name', 'Programme Name')}}
                              {{ Form::text('programme_name', $programme->programme_name, ['class' => 'form-control'])}}
                          </div>
                        </div>
                        <div class="col-md-4 px-1">
                          <div class="form-group">
                                {{ Form::Label('age_group', 'Age Group')}}
                                <select class="form-control" name="age_group" style="height: inherit;">
                                  @foreach ($ages as $age)
                                      @if ($age->id === $programme->age_group)
                                          <option value="{{ $age->id }}">{{$age->description.': '.$age->age_group}}</option>      
                                      @endif
                                  @endforeach
                                  @foreach ($ages as $age)
                                    <option value="{{ $age->id }}">{{ $age->description . ': ' . $age->age_group }}</option>
                                  @endforeach  
                                </select>
                                {{-- {{ Form::text('age_group', $programme->age_group, ['class' => 'form-control'])}} --}}
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                          <div class="form-group">
                                {{ Form::Label('price', 'Price')}}
                                {{ Form::text('price', $programme->price, ['class' => 'form-control'])}}
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                          <div class="form-group">
                                {{ Form::Label('description', 'Description')}}
                                {{ Form::textarea('description', $programme->description, ['class' => 'form-control'])}}
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                            <style type="text/css">
                                .mybutton{
                                    position: relative;
                                    width: 200px;
                                }

                                .mybutton input{
                                    position: absolute;
                                    z-index: 2;
                                    opacity: 0;
                                    width: inherit;
                                    height: 100%;
                                }
                            </style>
                            {{-- {{ Form::Label('cover_image', 'Cover Image')}} --}}
                            <div class="mybutton">
                                {{ Form::file('cover_image', ['value' => $programme->cover_image]) }}
                                {{ Form::button('Choose Cover Image', ['class' => 'btn btn-outline-primary'])}}
                            </div>
                      </div>
                    </div>
                    {{ Form::hidden('_method', 'PUT') }}
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            {{ Form::submit('Update Programme', ['class' => 'btn btn-primary btn-round']) }}
                        </div>
                    </div>
                        
                {!! Form::close() !!}
              </div>
            </div>
            <div class="card card-user" style="padding: 1rem;">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6">
                      <h5 class="card-title">Courses in this Programme </h5>
                      
                  </div>
                  <div class="col-lg-6 text-right">
                    <button type="submit" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModalCenter">+ New</button>
                  </div>
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">New Course</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                       
                            {{-- <form action="" method="post">
                                <div class="row">
                                  <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                      <label>Course Name</label>
                                      <input type="text" class="form-control" placeholder="">
                                    </div>
                                  </div>
                                  <div class="col-md-3 px-1">
                                    
                                    <div class="form-group">
                                      <label>Main Instructor</label>
                                      <input type="text" class="form-control" placeholder=""">
                                    </div>
                                  </div>
                                  <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Total Hours</label>
                                      <input type="email" class="form-control" placeholder="">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Programme ID" value="{{ $programme->id}}" hidden disabled>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                      <label>Description</label>
                                      <textarea type="text" class="form-control" placeholder="" style="width: 463px;"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Create Course</button>
                                  </div>
                                </div>
                            </form> --}}
                            {!! Form::open(['action' => 'Admin\CoursesController@store', 'method' => 'post']) !!}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::Label('course_name', 'Course Name')}}
                                            {{ Form::text('course_name', '', ['class' => 'form-control', 'placeholder' => 'Course Name'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          {{ Form::Label('main_instructor', 'Main Instructor')}}
                                          <div class="form-group">
                                            <select class="form-control" name="main_instructor" style="height: inherit;">
                                              <option>Assign an Instructor:</option>
                                              @foreach ($instructors as $instructor)
                                                <option value="{{ $instructor->id }}">{{ $instructor->fullname }}</option>
                                              @endforeach  
                                            </select>
                                          </div>
                                         
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group">
                                          {{ Form::Label('total_hours', 'Total Hours')}}
                                          {{ Form::text('total_hours', '', ['class' => 'form-control', 'placeholder' => 'Total Hours', 'style' => "height: inherit;"])}}
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      {{-- {{ Form::text('programme_id', '',['class' => 'form-control', 'placeholder' => 'Programme ID', 'hidden', 'value' => $programme->id ])}} --}}
                                      <input type="text" name="programme_id"  value="{{ $programme->id }}" hidden />
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      {{ Form::Label('course_description', 'Course Description')}}
                                      {{ Form::textarea('course_description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 text-center">
                                    {{ Form::submit('Create Course', ['class' => 'btn btn-primary'])}}
                                  </div>
                                </div>
                                      
                            {!! Form::close() !!}
                        </div>
                        {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                @if(count($courses) > 0)
                <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Course Name
                        </th>
                        <th>
                          Total Hours
                        </th>
                        <th class="text-right">
                          
                        </th>
                      </thead>
                      <tbody>
                        
                          @foreach ($courses as $course)
                              @if($course->programme_id == $programme->id)
                                <tr>
                                  <td>
                                    {{$course->course_name}}
                                  </td>
                                  <td>
                                    {{$course->total_hours}}
                                  </td>
                                  <td class="text-right">
                                    <a class="btn-outline-success" href="{{ route('courses.show', $course->id) }}" style="padding: 7px;">Course Details</a>
                                  </td>
                                </tr>
                              @endif
                          @endforeach
                      </tbody>
                    </table>
                </div>
                  @else
                        <div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b>Information - </b> No courses are available for this Programme at the moment</span>
                        </div>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection