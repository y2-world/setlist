@extends('layouts.app')
@section('content')
<br>
<div class="container-lg">
  <h2>Albums</h2>
  <a class="btn btn-outline-dark btn-sm" href="{{ url('/songs') }}" role="button">Songs</a>
  <a class="btn btn-outline-dark btn-sm" href="{{ url('/singles') }}" role="button">Singles</a>
  <a class="btn btn-outline-dark btn-sm" href="{{ url('/albums') }}" role="button">Albums</a>
  <table class="table table-striped">
      <thead>
        <tr>
          <th class="mb_list">#</th>
          <th class="mb_list">タイトル</th>
          <th class="mb_list">リリース日</th>
        </tr>
      </thead>
      <div class="all-setlist">
        <tbody>
            @foreach ($albums as $album)
              <tr>
                  <td>{{$album->album_id}}</td>
                  <td><a href="{{ route('albums.show', $album->id) }}">{{ $album->title }}</a></td>
                  <td>{{ date('Y.m.d', strtotime($album->date)) }}</td>
              </tr>
            @endforeach
        </tbody>
      </div>
    </table>
  <div class=”pagination”>
    {!! $albums->onEachSide(5)->links() !!}
  </div>
</div>
@endsection