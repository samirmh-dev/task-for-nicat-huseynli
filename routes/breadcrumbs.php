<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Ana səhifə', route('home'));
});


// Home > Flights
Breadcrumbs::for('flights', function ($trail) {
    $trail->parent('home');
    $trail->push('Uçuşlar', url('/flights'));
});


// Home > Flights > New Flight
Breadcrumbs::for('flights.new', function ($trail) {
    $trail->parent('flights');
    $trail->push('Yeni Uçuş', url('/flights/create'));
});

// Home > Flights > Edit Flight
Breadcrumbs::for('flights.edit', function ($trail,$flight) {
    $trail->parent('flights');
    $trail->push($flight->id, "/flights/{$flight->id}");
    $trail->push('Yenilə','');
});


// Home > Flights > Show Flight
Breadcrumbs::for('flights.show', function ($trail,$flight) {
    $trail->parent('flights');
    $trail->push($flight->id, '');
});
