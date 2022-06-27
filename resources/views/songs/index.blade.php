@extends('layouts.app')
@section('content')
<br>
<div class="container-lg">
  <h2>Songs</h2>
  <table class="table table-striped">
      <thead>
        <tr>
          <th class="mb_list">#</th>
          <th class="mb_list">タイトル</th>
          <th class="mb_list">アルバム</th>
        </tr>
      </thead>
      <div class="all-setlist">
        <tbody>
            @foreach ($songs as $song)
              <tr>
                  <td>{{$song->id}}</td>
                  <td><a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a></td>
                  <td>{{$song->album_id}}</td>
              </tr>
            @endforeach
        </tbody>
      </div>
    </table>
  <div class=”pagination”>
    {!! $songs->links() !!}
  </div>
</div>
@endsection