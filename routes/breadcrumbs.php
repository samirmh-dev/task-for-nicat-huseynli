<?php
/*
 * Home
 * */
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Ana səhifə', route('home'));
});


/*
 * Flights
 * */
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



/*
 *
 * Hotels
 * */
// Home > Hotels
Breadcrumbs::for('hotels', function ($trail) {
    $trail->parent('home');
    $trail->push('Otellər', url('/hotels'));
});


// Home > Hotels > New Hotel
Breadcrumbs::for('hotels.new', function ($trail) {
    $trail->parent('hotels');
    $trail->push('Yeni Otel', url('/hotels/create'));
});

// Home > Hotels > Edit Hotel
Breadcrumbs::for('hotels.edit', function ($trail,$model) {
    $trail->parent('hotels');
    $trail->push($model->name, "/hotels/{$model->id}");
    $trail->push('Yenilə','');
});


// Home > Hotels > Show Hotel
Breadcrumbs::for('hotels.show', function ($trail,$model) {
    $trail->parent('hotels');
    $trail->push($model->name, url('/hotels/'.$model->id));
});


/*
 *
 *
 * Hotels > Rooms
 * */
// Home > Hotels >Rooms
Breadcrumbs::for('hotels.rooms', function ($trail,$hotel) {
    $trail->parent('hotels.show',$hotel);
    $trail->push('Otaqlar', url("hotels/{$hotel->id}/rooms"));
});


// Home > Hotels > Rooms > New Room
Breadcrumbs::for('hotels.rooms.new', function ($trail,$hotel) {
    $trail->parent('hotels.rooms',$hotel);
    $trail->push('Yeni Otaq', url("hotels/{$hotel->id}/rooms/create"));
});

// Home > Hotels > Rooms > Edit Room
Breadcrumbs::for('hotels.rooms.edit', function ($trail,$hotel, $model) {
    $trail->parent('hotels.rooms',$hotel);
    $trail->push($model->number, "hotels/{$hotel->id}/rooms/{$model->id}");
    $trail->push('Yenilə','');
});


// Home > Hotels > Rooms > Show Hotel
Breadcrumbs::for('hotels.rooms.show', function ($trail,$hotel, $model) {
    $trail->parent('hotels.rooms',$hotel);
    $trail->push("№: ".$model->number, '');
});


/*
 *
 *
 * Hotels > Books
 * */
// Home > Hotels >Books
Breadcrumbs::for('hotels.books', function ($trail,$hotel) {
    $trail->parent('hotels.show',$hotel);
    $trail->push('Qeydiyyatlar', url("hotels/{$hotel->id}/books"));
});


// Home > Hotels > Books > New Book
Breadcrumbs::for('hotels.books.new', function ($trail,$hotel) {
    $trail->parent('hotels.books',$hotel);
    $trail->push('Yeni Qeydiyyat', url("hotels/{$hotel->id}/books/create"));
});

// Home > Hotels > Books > Edit Book
Breadcrumbs::for('hotels.books.edit', function ($trail,$hotel, $model) {
    $trail->parent('hotels.books',$hotel);
    $trail->push($model->id, "hotels/{$hotel->id}/books/{$model->id}");
    $trail->push('Yenilə','');
});


// Home > Hotels > Books > Show Book
Breadcrumbs::for('hotels.books.show', function ($trail,$hotel, $model) {
    $trail->parent('hotels.books',$hotel);
    $trail->push("№: ".$model->id, '');
});
