@extends('layouts.admindashboard')



@section('breadcrumb')
@endsection


@section('stuff')
    <div class="content">
      <div class="row">
        <div class="col-lg-12 text-right">
          <button type="submit" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModalCenter">+ Create Event</button>
           
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add New Programme</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    {!! Form::open(['action' => 'Admin\ProgrammesController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('fullname', 'Full Name')}} --}}
                                    {{ Form::text('programme_name', '', ['class' => 'form-control', 'placeholder' => 'Programme Name'])}}
                                </div>
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('instructor_name', 'Title')}} --}}
                                    {{-- {{ Form::select('target_audience', $ages, null, ['class' => 'form-control']) }} --}}
                                    {{-- {{ Form::text('target_audience', '', ['class' => 'form-control', 'placeholder' => 'Target Audience'])}} --}}
                                    <div class="form-group">
                                      <select class="form-control" name="age_group">
                                        <option>Please Select the Target Age Group:</option>
                                        @foreach ($ages as $age)
                                          <option value="{{ $age->id }}">{{ $age->description . ': ' . $age->age_group }}</option>
                                        @endforeach  
                                      </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('phone', 'Phone Number')}} --}}
                                    {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Programme Description'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('instructor_name', 'Title')}} --}}
                                    {{ Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price ($)'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('instructor_name', 'Title')}} --}}
                                    <div class="form-group">
                                      <select class="form-control" name="enrollment_status">
                                        <option>Define the Enrollment Status of This Programme:</option>                                        
                                          <option value="0">Closed</option>
                                          <option value="1">Open</option>                                       
                                      </select>
                                    </div>
                                    {{-- {{ Form::text('enrollment_status', '', ['class' => 'form-control', 'placeholder' => 'Enrollment Status'])}} --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-lg-3">
                                      {{ Form::button('Choose Cover Image', ['class' => 'btn btn-outline-primary'])}}
                                      {{ Form::file('cover_image') }}
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-lg-12 text-center">
                            {{ Form::submit('Save Event', ['class' => 'btn btn-primary'])}}
                          </div>
                        </div>   
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
            @include('layouts.messages') 
        </div>
      </div>
      <div class="row">
        @if(count($programmes) > 0)
          @foreach ($programmes as $programme)
              <div class="col-md-6">
                <div class="card">
                  <img src="{{ asset('/storage/cover_images/'.$programme->cover_image) }}">
                  <div class="card-header text-center"  style="padding-bottom: 0rem;">
                    <h2 class="card-title"> {{$programme->programme_name}}</h2>
                  </div>
                  <div class="card-body"  style="padding-left: 1rem; padding-right: 1rem; padding-top: 0rem;">
                    <p class="blockquote blockquote-primary" style="padding-top: 1rem; font-size: 15px;">{{$programme->description}}</p>
                    <br>
                    <div class="row">
                      <div class="col-lg-12 text-center">
                        <a class="btn-outline-primary" href="{{ route('programmes.show', $programme->id) }}" style="padding: 7px;">Programme Details</a>
                      </div>
                      {{-- <div class="col-lg-4">
                        <a class="btn-outline-success" href="{{ route('admin.coursedetails') }}" style="padding: 7px;">Edit Courses</a>
                      </div> --}}
                      {{-- <div class="col-lg-6">
                        <a class="btn-outline-success" href="#" style="padding: 7px;">Extra</a>
                      </div> --}}
                    </div>
                    <br>
                    <br>
                  </div>
                </div>
              </div>
          @endforeach
        @else
          <div class="col-12">
          <div class="alert alert-info">
            No Programmes Were Found
          </div>
          </div>
        @endif
        
        {{-- <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header">
              <h4 class="card-title"> Table on Plain Background</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      Name
                    </th>
                    <th>
                      Country
                    </th>
                    <th>
                      City
                    </th>
                    <th class="text-right">
                      Salary
                    </th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        Dakota Rice
                      </td>
                      <td>
                        Niger
                      </td>
                      <td>
                        Oud-Turnhout
                      </td>
                      <td class="text-right">
                        $36,738
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Minerva Hooper
                      </td>
                      <td>
                        Curaçao
                      </td>
                      <td>
                        Sinaai-Waas
                      </td>
                      <td class="text-right">
                        $23,789
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Sage Rodriguez
                      </td>
                      <td>
                        Netherlands
                      </td>
                      <td>
                        Baileux
                      </td>
                      <td class="text-right">
                        $56,142
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Philip Chaney
                      </td>
                      <td>
                        Korea, South
                      </td>
                      <td>
                        Overland Park
                      </td>
                      <td class="text-right">
                        $38,735
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Doris Greene
                      </td>
                      <td>
                        Malawi
                      </td>
                      <td>
                        Feldkirchen in Kärnten
                      </td>
                      <td class="text-right">
                        $63,542
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Mason Porter
                      </td>
                      <td>
                        Chile
                      </td>
                      <td>
                        Gloucester
                      </td>
                      <td class="text-right">
                        $78,615
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Jon Porter
                      </td>
                      <td>
                        Portugal
                      </td>
                      <td>
                        Gloucester
                      </td>
                      <td class="text-right">
                        $98,615
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
@endsection