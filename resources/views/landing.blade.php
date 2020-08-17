@extends('layouts.master')
@section('content')
<div class="connected-image-container">
    <div class="connected-image">
        <div class="connected-image-text">
            <h2>Con·nect·ed·ness: a feeling of belonging to or having affinity with a particular person or group</h2?>
        </div>
    </div>
</div>
<div class="services-breakdown">
    <div class="row">
        <div class="col-lg-6 individual-coaching-preview text-center">
            <div class="invidividual-coaching-title dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h3>Individual Coaching</h3></button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 team-coaching-preview text-center">
            <div class="team-coaching-title dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h3>Team Coaching</h3></button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="avatar text-center">
    <img src="/images/avatar.jpg" alt="Life coaching, Carrer coaching, Calgary, Human Resources, Lumina, Team Coaching "/>
</div>
<div class="meet-helen">
    <div class="meet-helen-title text-center">
        <h3>Meet Helen</h3>
    </div>
    <div class="meet-helen-description">
        <p> - This would be where Jelmer would right about his Mom - ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequa</p>
    </div>
</div>
<div class="learn-more-button text-center">
    <button class="btn btn-custom"><a href="#about">Learn More about Helen</a></button>
</div>
<div class="qualifications">
    <div class="row">
        <div class="col-lg-4 cti-qualification text-center">
            <img src="/images/1.jpg" alt=""/>
        </div>
        <div class="col-lg-4 lumina text-center">
            <img src="/images/lumina.jpg">
        </div>
        <div class="col-lg-4 coach text-center">
            <img src="/images/coach.jpg">
        </div>
    </div>
</div>
<div class="landing-schedule">
    <h3>Schedule</h3>
    <div id="app">
        <calendar-component></calendar-component>
    </div>
</div>
@stop
