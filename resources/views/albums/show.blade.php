@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="setlist"># {{$albums->album_id}}</div>
          <h3> {{$albums->title}}</h3>
          <div class="setlist">
            Release Date : {{ date('Y.m.d', strtotime($albums->date)) }}
            <hr>
            @foreach ($songs as $song)
              @if($albums->id == $song->album_id)
              {{$song->album_trk}}. <td><a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a></td>
              <br>
              @endif
            @endforeach
            <br>
            {{ $albums->text }}
          </div>
          <br>
          <div class="show_button">
            @if(isset($previous))
            <a class="btn btn-outline-dark" href="{{ route('albums.show', $previous->id)}}" rel="prev" role="button"><</a>
            @endif
            @if(isset($next))
            <a class="btn btn-outline-dark" href="{{ route('albums.show', $next->id)}}"rel="next" role="button">></a>
            @endif
          </div> 
        </div>
    </div>       
</div>         
@endsection