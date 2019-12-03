@extends('layouts.admindashboard')

@section('stuff')
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Messages</h5>
                <hr>

              </div>
              <div class="card-body" style=" padding-bottom: 1rem;">
                <div class="row">
                  <div class="col-lg-3" style="border-right: solid 1px; height: 500px;">
                      <ul class="list-unstyled team-members">
                          
                  <?php $listed = array(); ?>
                  @if (count($messages_received) > 0 or count($messages_sent) > 0)
                    @foreach ($messages_received as $rec_message)
                          @if (!in_array($rec_message->recipient, $listed))
                               @foreach ($users as $user)
                                    @if($rec_message->sender === $user->id)
                                      <div id="dom-target" style="width: 0px; height: 0px; opacity: 0;">
                                          <?php echo htmlspecialchars($user->id) ?>
                                      </div>
                                      <a href="#" onclick="doThing(document.getElementById('dom-target'))">
                                        <li class="messages" style="padding-bottom: 0rem;">
                                            <div class="row" style="padding-top: 1rem; padding-bottom: 0rem;">
                                              <div class="col-md-2 col-2">
                                                <div class="avatar">
                                                  <img src="{{ asset('/storage/cover_images/'.$user->profpic) }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                </div>
                                              </div>
                                              <div class="col-md-7 col-7">
                                                
                                                      {{ $user->name }}
                                                <br/>
                                                <span class="text-muted">
                                                  <small>Offline</small>
                                                </span>
                                              </div>
                                          </div>
                                          <hr>
                                        </li>
                                      </a>
                                    @endif
                                  @endforeach
                                  <?php $listed[] += $rec_message->recipient; ?>
                          @endif 
                        
                            
                        {{-- @endif --}}
                    @endforeach

                    @foreach ($messages_sent as $sent_message)
                          @if (!in_array($sent_message->sender, $listed))
                               @foreach ($users as $user)
                                    @if($sent_message->sender === $user->id)
                                      <a href="#" onclick="alert('This is a test')">
                                        <li class="messages" style="padding-bottom: 0rem;">
                                            <div class="row" style="padding-top: 1rem; padding-bottom: 0rem;">
                                              <div class="col-md-2 col-2">
                                                <div class="avatar">
                                                  <img src="{{ asset('/storage/cover_images/'.$user->profpic) }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                </div>
                                              </div>
                                              <div class="col-md-7 col-7">
                                                      {{ $user->name }}
                                                <br/>
                                                <span class="text-muted">
                                                  <small>Offline</small>
                                                </span>
                                              </div>
                                          </div>
                                          <hr>
                                        </li>
                                      </a>
                                    @endif
                                  @endforeach
                                  <?php $listed[] += $sent_message->sender; ?>
                          @endif 
                    @endforeach
                  @else
                    <div class="alert alert-primary alert-dismissible fade show">
                      <span>
                        <b>No messages. </b></span>
                    </div>
                  @endif
                  
                </ul>
                  </div>
                  <div class="col-lg-9">
                      <style class="text/css">
                          .scrollable {
                              height: 100px; /* or any value */
                              overflow-y: auto;
                          }
                      </style>
                      <div class="scrollable">
                          <span id="answer1" style="display: none;">
                            <h1> Now Visible</h1>
                          </span>
                      </div>
                  </div>
                </div>
                {{-- <div class="row">
                  <div class="col-md-6">
                    <div class="card card-plain">
                      <div class="card-header">
                        <h5 class="card-title">Notifications Style</h5>
                      </div>
                      <div class="card-body">
                        <div class="alert alert-info">
                          <span>This is a plain notification</span>
                        </div>
                        <div class="alert alert-info alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>This is a notification with close button.</span>
                        </div>
                        <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                          <span data-notify="message">This is a notification with close button and icon.</span>
                        </div>
                        <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span data-notify="icon" class="nc-icon nc-chart-pie-36"></span>
                          <span data-notify="message">This is a notification with close button and icon and have many lines. You can see that the icon and the close button are always vertically aligned. This is a beautiful notification. So you don't have to worry about the style.</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card card-plain">
                      <div class="card-header">
                        <h5 class="card-title">Notification states</h5>
                      </div>
                      <div class="card-body">
                        <div class="alert alert-primary alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Primary - </b> This is a regular notification made with ".alert-primary"</span>
                        </div>
                        <div class="alert alert-info alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Info - </b> This is a regular notification made with ".alert-info"</span>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Success - </b> This is a regular notification made with ".alert-success"</span>
                        </div>
                        <div class="alert alert-warning alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Warning - </b> This is a regular notification made with ".alert-warning"</span>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>
                            <b> Danger - </b> This is a regular notification made with ".alert-danger"</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="places-buttons">
                  <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                      <h4 class="card-title">
                        Notifications Places
                        <p class="category">Click to view notifications</p>
                      </h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto">
                      <div class="row">
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-block" onclick="demo.showNotification('top','left')">Top Left</button>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-block" onclick="demo.showNotification('top','center')">Top Center</button>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-block" onclick="demo.showNotification('top','right')">Top Right</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto">
                      <div class="row">
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-block" onclick="demo.showNotification('bottom','left')">Bottom Left</button>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-block" onclick="demo.showNotification('bottom','center')">Bottom Center</button>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-block" onclick="demo.showNotification('bottom','right')">Bottom Right</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>

      <script>
        function doThing($id) {
            var x = Number($id.textContent);
            window.alert('This is the id: ' + x);
        }
      </script>
  @endsection