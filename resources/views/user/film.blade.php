@extends('layouts.app')
@section('title')
Film
@endsection
@section('content')
    <div class="film-container">
        <div class="row">
            <div class="col-md-7">
                <p class="top-title">OUR FILMS</p>
                <p> - strong character driven films</p>
                <p> - musical, comedies, dramas, thrillers</p>
                <p> - no political undertones or ideology</p>
                <p>&nbsp;&nbsp;&nbsp;(and Hollywood wonders why it's losing movie-goers?)</p>
                <p> - ratings: G, PG and R</p>
                <p> - excellent, intelligent written films only</p>
                <p> - evil will never triumph in our films</p>
                <p> - mission of fun, entertainment & profitability for you</p>
            </div>
            <div class="col-md-5" style="text-align: center;margin-top: 30px;">
                <img src="/assets/images/ifindfilms_view.jpg" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="upcoming-role">Upcoming: Role Prey</p>
                <p class="upcoming-role-down">Hilarious Musical / Comedy Thriller</p>
            </div>
            <div class="col-md-6">
                <p class="upcoming-role">The Nashville Way</p>
                <p class="upcoming-role-down">A fun filled musical odyssey</p>
            </div>
        </div>
    </div>
@endsection
