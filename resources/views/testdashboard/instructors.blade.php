@extends('layouts.admindashboard')



@section('breadcrumb')
@endsection

@section('stuff')
    <div class="content">
      <div class="row">
        
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="card" style="padding: 1rem;">
                <div class="card-header ">
                  <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">Course instructors </h5> 
                    </div>
                    <div class="col-lg-6 text-right">
                      <button type="submit" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModalCenter">+ Add New</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                        @include('layouts.messages')
                    </div>
                  </div>
                  <strong><hr></strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    @if(count($instructors) > 0)
                       @foreach ($instructors as $instructor)
                          <div class="col-4">
                            <div class="card card-user">
                              <div class="image">
                                <img src="{{ asset('user-dashboard-assets/img/damir-bosnjak.jpg')}}" alt="...">
                              </div>
                              <div class="card-body" style="height: 2rem;">
                                <div class="row">
                                    <div class="author" style="padding-left: 1rem;">
                                      <a href="#">
                                        <img class="avatar border-gray" src="{{ asset('/storage/cover_images/'.$instructor->cover_image) }}" alt="..." style="">
                                      </a>
                                    </div>
                                </div>
                                <h5 class="title" style="">{{ $instructor->fullname }}</h5>
                                <a href="{{ route('instructors.show', $instructor->id) }}" class="btn btn-outline-primary btn-round">View Profile</a>
                              </div>
                            </div>
                          </div>
                       @endforeach
                    @else
                      <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span>
                          <b>Information - </b> No instructors are available for this Course at the moment</span>
                      </div>
                    @endif
                    {{-- <div class="col-lg-12">
                      @if(count($instructors) > 0)
                        <table class="table table-hover">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">#id</th>
                              <th scope="col">Instructor Name</th>
                              <th scope="col">Action</th>
                              
                            </tr>
                          </thead>
                          
                            @foreach ($instructors as $instructor)
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $instructor->id }}</th>
                                  <td>{{ $instructor->fullname }}</td>
                                  <td><a href="{{ route('instructors.show', $instructor->id) }}">View Details</a></td>
                  
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
                            <b>Information - </b> No instructors are available for this Course at the moment</span>
                        </div>
                      @endif
                    </div> --}}
                    <div class="col-lg-6">
                      
                    </div>
                  </div>
                  
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Add New Istructor</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                            {!! Form::open(['action' => 'Admin\InstructorsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{-- {{ Form::Label('fullname', 'Full Name')}} --}}
                                            {{ Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Full Name'])}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{-- {{ Form::Label('instructor_name', 'Title')}} --}}
                                            {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{-- {{ Form::Label('phone', 'Phone Number')}} --}}
                                            {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone Number'])}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                          <div class="row">
                                            <div class="col-lg-3">
                                              {{ Form::button('Choose File', ['class' => 'btn btn-primary'])}}
                                              {{ Form::file('cover_image') }}
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
                                  <div class="col-lg-12 text-center">
                                    {{ Form::submit('Save Instructor', ['class' => 'btn btn-primary'])}}
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
    </div>
@endsection