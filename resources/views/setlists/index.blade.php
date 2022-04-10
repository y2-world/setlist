@extends('layouts.app')
@section('content')
<br>
<div class="container">
  <h1>ALL SET LISTS</h1>
  <a class="btn btn-outline-dark btn-sm" href="{{ url('/setlists') }}" role="button">All</a>
  <div class="btn-group">
    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
      Artists
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      @foreach ($artists as $artist)
      <li><a class="dropdown-item" href="{{ url('/artists', $artist->id)}}">{{ $artist->name }}</a></li>
      @endforeach
    </ul>
  </div>
  <div class="btn-group">
    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
      Years
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    </ul>
  </div>
  <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>開催日</th>
          <th>アーティスト名</th>
          <th>ツアータイトル</th>
          <th>会場</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($setlists as $setlist)
          <tr>
              <td></td>
              <td>{{ $setlist->date }}</td>
              <td><a href="{{ url('artists', $setlist->artist_id)}}">{{ $setlist->artist->name }}</a></td>
              <td><a href="{{ route('setlists.show', $setlist->id) }}">{{ $setlist->tour_title }}</a></td>
              <td>{{ $setlist->venue }}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection
