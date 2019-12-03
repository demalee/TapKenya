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
                  <h5 class="modal-title" id="exampleModalLongTitle">Create New Event</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    {!! Form::open(['action' => 'Admin\EventsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('fullname', 'Full Name')}} --}}
                                    {{ Form::text('event_name', '', ['class' => 'form-control', 'placeholder' => 'Event Name'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('instructor_name', 'Title')}} --}}
                                    {{ Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location'])}}
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
                                      <select class="form-control" name="target_audience">
                                        <option>Please Select your Target Audience:</option>
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
                                    {{ Form::textarea('event_description', '', ['class' => 'form-control', 'placeholder' => 'Event Description'])}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- {{ Form::Label('instructor_name', 'Title')}} --}}
                                    {{ Form::text('tags', '', ['class' => 'form-control', 'placeholder' => 'Tags'])}}
                                </div>
                            </div>
                        </div>
                        <div class="" style="">
                          <div class="" style="padding: 1rem;">
                            <div class="row">
                                <div class="col-lg-12 text-left">
                                    <div class="form-group">
                                        {{ Form::Label('date', 'Event Date')}}
                                        {{ Form::date('date', '', ['class' => 'form-control', 'placeholder' => 'Event Date'])}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 text-left">
                                    <div class="form-group">
                                        {{ Form::Label('start_time', 'From')}}
                                        {{ Form::time('start_time', '', ['class' => 'form-control', 'placeholder' => 'Start Time'])}}
                                    </div>
                                </div>
                                <div class="col-lg-6 text-left">
                                    <div class="form-group">
                                        {{ Form::Label('end_time', 'To')}}
                                        {{ Form::time('end_time', '', ['class' => 'form-control', 'placeholder' => 'End TIme'])}}
                                    </div>
                                </div>
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
          <div class="col-lg-12">
              @if(count($events) > 0)
                  @foreach ($events as $event)
                      <div class="col-md-6">
                        <div class="card">
                          <img src="{{ asset('/storage/cover_images/'.$event->cover_image) }}">
                          <div class="card-header text-center"  style="padding-bottom: 0rem;">
                            <h2 class="card-title"> {{$event->event_name}}</h2>
                          </div>
                          <div class="card-body"  style="padding-left: 1rem; padding-right: 1rem; padding-top: 0rem;">
                            <p class="blockquote blockquote-primary" style="padding-top: 1rem; font-size: 15px;">{{$event->event_description}}</p>
                            <br>
                            <div class="row">
                              <div class="col-lg-12 text-center">
                                <a class="btn-outline-primary" href="{{ route('events.show', $event->id) }}" style="padding: 7px;">Event Details</a>
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
                <div class="alert alert-danger alert-dismissible fade show">
                  <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                  </button>
                  <span>
                    <b>Information - </b> No Events are scheduled at the moment</span>
                </div>
              @endif
          </div>
      
      </div>
    </div>
@endsection