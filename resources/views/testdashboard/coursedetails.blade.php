@extends('layouts.admindashboard')

@section('breadcrumb')
    <a class="btn-outline-success" href="{{ route('programmes.show', $course->programme_id) }}" style="padding: 7px;">Back</a>
@endsection

@section('stuff')
      <div class="content">
        <div class="row">
            <div class="col-12">
                @include('layouts.messages')
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Course Details | {{ $course->course_name}}</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" class="form-control" disabled="" placeholder="Full Name" value="{{ $course->course_name }}">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Total Hours</label>
                        <input type="text" class="form-control" disabled="" placeholder="Phone Number" value="{{ $course->total_hours }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Main Instructor</label>
                        <input type="text" class="form-control" disabled="" placeholder="Main Instructor" value="{{ $instructor->fullname }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-12">
                          <label for="exampleInputEmail1">Description</label>
                          <textarea type="text" class="form-control" disabled="" placeholder="{{ $course->course_description }}" value="{{ $course->course_description }}"></textarea>
                      </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button href="#" class="btn btn-primary btn-round">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>


            {{-- <div class="card" style="padding: 1rem;">
              <div class="card-header ">
                <h4>Course Details | {{ $course->course_name}}</h4>
                <strong><hr></strong>
                
              </div>
              <div class="card-body ">
                  <div class="row">
                    <div class="col-lg-6">
                        <h6>Total Hours</h6>
                        <p> {{ $course->total_hours}} </p>
                    </div>
                    <div class="col-lg-6">
                        <h6>Main Instructor</h6>
                        <p> {{ $course->main_instructor}} </p>
                    </div>
                  </div>      
                  <h6>Description</h6>
                  <p class="text-info">
                      {{ $course->course_description}} 
                  </p>
              </div>
            </div> --}}


            <div class="card" style="padding: 1rem;">
                <div class="card-header ">
                  <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Courses Materials </h5>
                        
                    </div>
                    <div class="col-lg-6 text-right">
                      <button type="submit" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModalCenter">+ Add New</button>
                    </div>
                  </div>
                  <strong><hr></strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      @if(count($materials) > 0)
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#id</th>
                              <th scope="col">File Name</th>
                              <th scope="col">Action</th>
                              {{-- <th scope="col">Handle</th> --}}
                            </tr>
                          </thead>
                          
                            @foreach ($materials as $material)
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $material->id }}</th>
                                  <td>{{ $material->material_name }}</td>
                                  <td><a href="/storage/materials/{{ $material->pdf }}">Download</a></td>
                                  {{-- <td>@mdo</td> --}}
                                </tr>
                              </tbody>   
                            @endforeach
                            
                        </table>
                      @else
                        <div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b>Information - </b> No Materials are available for this Course at the moment</span>
                        </div>
                      @endif

                        

                    </div>
                    <div class="col-lg-6">
                      
                    </div>
                  </div>
                </div>
            
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Add Course Material</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['action' => 'Admin\MaterialsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{-- {{ Form::Label('material_name', 'Title')}} --}}
                                            {{ Form::text('material_name', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-3">
                                              {{ Form::button('Choose File', ['class' => 'btn btn-primary'])}}
                                              {{ Form::file('pdf') }}
                                            </div>
                                            <div class="col-lg-9">
                                              {{-- <div class="progress" style="margin-left: 1rem; height: 35px; margin-top: 1rem;">
                                                  <div class="bar"></div >
                                                  <div class="percent">0%</div >
                                              </div> --}}
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      {{-- {{ Form::text('programme_id', '',['class' => 'form-control', 'placeholder' => 'Programme ID', 'hidden', 'value' => $programme->id ])}} --}}
                                      <input type="text" name="course_id"  value="{{ $course->id }}" hidden />
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 text-center">
                                    {{ Form::submit('Upload', ['class' => 'btn btn-primary'])}}
                                  </div>
                                </div>   
                            {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
@endsection