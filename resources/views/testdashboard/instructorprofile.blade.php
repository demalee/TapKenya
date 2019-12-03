@extends('layouts.admindashboard')

@section('breadcrumb')
        <a class="btn-outline-success" href="{{ route('instructors.index') }}" style="padding: 7px;">Back</a>
@endsection

@section('stuff')
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{ asset('user-dashboard-assets/img/damir-bosnjak.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="{{ asset('/storage/cover_images/'.$instructor->cover_image) }}" alt="...">
                    <h5 class="title">{{ $instructor->fullname }}</h5>
                  </a>
                  
                </div>
                <p class="description text-center">
                 {{-- {{ Auth::user()->description }} --}}
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>12
                        <br>
                        <small>Files</small>
                      </h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>2GB
                        <br>
                        <small>Used</small>
                      </h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>24,6$
                        <br>
                        <small>Spent</small>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Instructor Profile</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" disabled="" placeholder="Full Name" value="{{ $instructor->fullname }}">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Phone Numbber</label>
                        <input type="text" class="form-control" disabled="" placeholder="Phone Number" value="{{ $instructor->phone }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" disabled="" placeholder="Email" value="{{ $instructor->phone }}">
                      </div>
                    </div>
                  </div>
                  <!--div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" value="Chet">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                      </div>
                    </div>
                  </div-->


                  {{-- <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" placeholder="Email Address" value="">
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" placeholder="Phone" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="Nairobi">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="Kenya">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code" value="00100">
                      </div>
                    </div>
                  </div> --}}


                  <!--div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control textarea"></textarea>
                      </div>
                    </div>
                  </div-->
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button href="#" class="btn btn-primary btn-round">Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card card-user" style="padding: 1rem;">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-9">
                      <h5 class="card-title">Courses | {{ $instructor->fullname }} </h5>
                      
                  </div>
                  <div class="col-lg-3 text-right">
                    {{-- <button type="submit" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModalCenter">+ New</button> --}}
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
                            <b>Information - </b> The Instructor currently has no teaching roles.</span>
                        </div>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection