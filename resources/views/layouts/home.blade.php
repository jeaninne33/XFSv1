@extends('layouts.app')
@section('css')
@endsection
@section('contenido')

<h1 class="no-margin skin-color">Hi Jessica, Welcome to Travelo!</h1>
<p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
<br />
<div class="row block">
    <div class="col-sm-6 col-md-3">
        <a href="hotel-list-view.html">
            <div class="fact blue">
                <div class="numbers counters-box">
                    <dl>
                        <dt class="display-counter" data-value="3200">0</dt>
                        <dd>Hotels to Stay</dd>
                    </dl>
                    <i class="icon soap-icon-hotel"></i>
                </div>
                <div class="description">
                    <i class="icon soap-icon-longarrow-right"></i>
                    <span>View Hotels</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="flight-list-view.html">
            <div class="fact yellow">
                <div class="numbers counters-box">
                    <dl>
                        <dt class="display-counter" data-value="4509">0</dt>
                        <dd>Airlines to Travel</dd>
                    </dl>
                    <i class="icon soap-icon-plane"></i>
                </div>
                <div class="description">
                    <i class="icon soap-icon-longarrow-right"></i>
                    <span>View Flights</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="car-list-view.html">
            <div class="fact red">
                <div class="numbers counters-box">
                    <dl>
                        <dt class="display-counter" data-value="3250">0</dt>
                        <dd>VIP Transports</dd>
                    </dl>
                    <i class="icon soap-icon-car"></i>
                </div>
                <div class="description">
                    <i class="icon soap-icon-longarrow-right"></i>
                    <span>View Cars</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="cruise-list-view.html">
            <div class="fact green">
                <div class="numbers counters-box">
                    <dl>
                        <dt class="display-counter" data-value="1570">0</dt>
                        <dd>Celebrity Cruises</dd>
                    </dl>
                    <i class="icon soap-icon-cruise flip-effect"></i>
                </div>
                <div class="description">
                    <i class="icon soap-icon-longarrow-right"></i>
                    <span>View Cruises</span>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="notification-area">
    <div class="info-box block">
        <span class="close"></span>
        <p>This is your Dashboard, the place to check your Profile, respond to Reservation Requests, view upcoming Trip Information, and much more.</p>
        <br />
        <ul class="circle">
            <li><span class="skin-color">Learn How It Works</span> — Watch a short video that shows you how Travelo works.</li>
            <li><span class="skin-color">Get Help</span> — View our help section and FAQs to get started on Travelo. </li>
        </ul>
    </div>
</div>

<div class="row block">
    <div class="col-md-6 notifications">
        <h2>Notifications</h2>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-plane-right takeoff-effect yellow-bg"></i>
                <span class="time pull-right">JUST NOW</span>
                <p class="box-title">London to Paris flight in <span class="price">$120</span></p>
            </div>
        </a>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-hotel blue-bg"></i>
                <span class="time pull-right">10 Mins ago</span>
                <p class="box-title">Hilton hotel &amp; resorts in <span class="price">$247</span></p>
            </div>
        </a>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-car red-bg"></i>
                <span class="time pull-right">39 Mins ago</span>
                <p class="box-title">Economy car for 2 days in <span class="price">$39</span></p>
            </div>
        </a>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-cruise green-bg"></i>
                <span class="time pull-right">1 hour ago</span>
                <p class="box-title">Baja Mexico 4 nights in <span class="price">$537</span></p>
            </div>
        </a>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-hotel blue-bg"></i>
                <span class="time pull-right">2 hours ago</span>
                <p class="box-title">Roosevelt hotel in <span class="price">$170</span></p>
            </div>
        </a>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-hotel blue-bg"></i>
                <span class="time pull-right">3 hours ago</span>
                <p class="box-title">Cleopatra Resort in <span class="price">$247</span></p>
            </div>
        </a>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-car red-bg"></i>
                <span class="time pull-right">3 hours ago</span>
                <p class="box-title">Elite Car per day in <span class="price">$48.99</span></p>
            </div>
        </a>
        <a href="#">
            <div class="icon-box style1 fourty-space">
                <i class="soap-icon-cruise green-bg"></i>
                <span class="time pull-right">last night</span>
                <p class="box-title">Rome to Africa 1 week in <span class="price">$875</span></p>
            </div>
        </a>
        <a href="#">
            <div class="load-more">. . . . . . . . . . . . . </div>
        </a>
    </div>
    <div class="col-md-6">
        <h2>Recent Activity</h2>
        <div class="recent-activity">
            <ul>
                <li>
                    <a href="#">
                        <i class="icon soap-icon-plane-right circle takeoff-effect yellow-color"></i>
                        <span class="price"><small>avg/person</small>$120</span>
                        <h4 class="box-title">
                            Indianapolis to Paris<small>Oneway flight</small>
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon soap-icon-car circle red-color"></i>
                        <span class="price"><small>per day</small>$45.39</span>
                        <h4 class="box-title">
                            Economy Car<small>bmw mini</small>
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon soap-icon-cruise circle green-color"></i>
                        <span class="price"><small>from</small>$578</span>
                        <h4 class="box-title">
                            Jacksonville to Asia<small>4 nights</small>
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon soap-icon-hotel circle blue-color"></i>
                        <span class="price"><small>Avg/night</small>$620</span>
                        <h4 class="box-title">
                            Hilton Hotel &amp; Resorts<small>Paris france</small>
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon soap-icon-hotel circle blue-color"></i>
                        <span class="price"><small>avg/night</small>$170</span>
                        <h4 class="box-title">
                            Roosevelt Hotel<small>new york</small>
                        </h4>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon soap-icon-plane-right circle takeoff-effect yellow-color"></i>
                        <span class="price"><small>avg/person</small>$348</span>
                        <h4 class="box-title">
                            Mexico to England<small>return flight</small>
                        </h4>
                    </a>
                </li>
            </ul>
            <a href="#" class="button green btn-small full-width">VIEW ALL ACTIVITIES</a>
        </div>
    </div>
</div>
<hr>

@endsection

@section('scripts')
@endsection
