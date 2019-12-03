@extends('layouts.admindashboard')

@section('breadcrumb')
    <a class="btn-outline-success" href="{{ route('events.index') }}" style="padding: 7px;">Back</a>
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
                <img src="{{ asset('/storage/cover_images/'.$event->cover_image) }}" alt="..." style="width: 100%;">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    {{-- <img class="avatar border-gray" src="{{ asset('user-dashboard-assets/img/mike.jpg')}}" alt="..."> --}}
                    <br>
                    <br>
                    <br>
                    <br>
                    <h5 class="title">{{ $event->event_name }}</h5>
                    
                     
                  </a>
                </div>
                
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
            
                    <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                      <h5>200
                        <br>
                        <small>Signed Up</small>
                      </h5>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-md-8">
            <div class="card card-user"  style="padding: 1rem;">
              <div class="card-header">
                <h5 class="card-title">Edit Event</h5>
              </div>
              <div class="card-body">
                {!! Form::open(['action' => ['Admin\EventsController@update', $event->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-5 pr-1">
                          <div class="form-group">
                              {{ Form::Label('event_name', 'Event Name')}}
                              {{ Form::text('event_name', $event->event_name, ['class' => 'form-control'])}}
                          </div>
                        </div>
                        <div class="col-md-3 px-1">
                          <div class="form-group">
                                {{ Form::Label('location', 'Event Location')}}
                                {{ Form::text('location', $event->location, ['class' => 'form-control'])}}
                          </div>
                        </div>
                        <div class="col-md-4 pl-1">
                          <div class="form-group">
                                {{ Form::Label('target_audience', 'Target Audience')}}
                                {{ Form::text('target_audience', $event->target_audience, ['class' => 'form-control'])}}
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                          <div class="form-group">
                                {{ Form::Label('event_description', 'Event Description')}}
                                {{ Form::textarea('event_description', $event->event_description, ['class' => 'form-control'])}}
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                                {{ Form::Label('date', 'Date')}}
                                {{ Form::date('date', $event->date, ['class' => 'form-control'])}}
                          </div>
                        </div>
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                                {{ Form::Label('start_time', 'From')}}
                                {{ Form::time('start_time', $event->start_time, ['class' => 'form-control'])}}
                          </div>
                        </div>
                        <div class="col-md-4 pr-1">
                          <div class="form-group">
                                {{ Form::Label('end_time', 'To')}}
                                {{ Form::time('end_time', $event->end_time, ['class' => 'form-control'])}}
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
                                {{ Form::file('cover_image', ['value' => $event->cover_image]) }}
                                {{ Form::button('Choose Cover Image', ['class' => 'btn btn-outline-primary'])}}
                            </div>
                      </div>
                    </div>
                    {{ Form::hidden('_method', 'PUT') }}
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            {{ Form::submit('Update Event Details', ['class' => 'btn btn-primary btn-round']) }}
                        </div>
                    </div>
                        
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection