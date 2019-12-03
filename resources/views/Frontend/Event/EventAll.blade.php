@extends('layouts.Frontend')
@section('content')
 <section class="markert-section">   
    <div class="container">
      <div class="events-all-group clearfix"> 
        @if(!$GetAllEvents->isEmpty())
        <?php
          $i=0;
        ?>
        @foreach($GetAllEvents as $Event)
          <?php
          $OddEvenClass = "";
          if($i%2==0)
          {
            $OddEvenClass = "Oddcol";
          }
          else
          {
            $OddEvenClass = "Evencol";
          }
          $i++;
        ?>
        <!-- <center> -->
        <div class="col-md-3 col-row {{ $OddEvenClass }} " style="border: solid 1px; margin: 40px; " >
          <div class="event-full"><br>
            <div class="event-img"><img class="ev-cl" src="{{ asset('images/event_logo/'.$Event->event_logo) }}" style="width: 1000px; height: 400px;"></div>
            <div class="all-events">
              <div class="col-md-4">
                
             <div class="pull-left">
               <div class="events-date"><span><?php echo date("F",strtotime($Event->event_date)) ?></span><br><?php echo date("d",strtotime($Event->event_date)) ?></div> </div></div>
               <div class="title-events">
                 <div class="col-md-12">
                   <div class="pull-right">
                <h3>{{ $Event->event_name }}</h3>
                 <p><span>Today {{ $Event->event_time }}<span aria-hidden="true" role="presentation">  </span>{{ $Event->event_address }}</span></p></div></div>
                 <!-- <div class="_7u2">4 people interested</div> -->
              </div>
            </div><br>
            <div class="disc-eve">
              Event Description : <?php echo $Event->event_description; ?><br>
              <p>WhatsApp/Call : {{ $Event->event_mobile }}</p><br>
              <p><a href="#">website : {{ $Event->event_website }}</a></p>
            </div>
          </div>
        </div>
      <!-- </center> -->
        @endforeach
        @else
          {{ 'Currentlly No Event Found' }}
        @endif
      </div>
    </div>
      </section>
@endsection