@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-outline-dark btn-sm" href="{{ url('/songs') }}" role="button">Songs</a>
            <br><br>
            @if(isset($songs->song_id))
            <div class="setlist"># {{$songs->song_id}}</div>
            @endif
            <h3> {{$songs->title}}</h3>
            <div class="setlist">
                @if(isset($songs->album->title))
                    @if(isset($songs->album->title))
                    Album : <a href="{{ route('albums.show', $songs->album_id) }}">{{ $songs->album->title }}</a></td>
                    @endif
                    <br>
                    @if(isset($songs->album->date))
                    Release Date : {{ date('Y.m.d', strtotime($songs->album->date)) }}
                    @endif
                @else
                    アルバム未収録
                @endif
                <hr>
                {{ $songs->text }}
            </div>
            <br>
            <div class="show_button">
                @if(isset($previous))
                <a class="btn btn-outline-dark" href="{{ route('songs.show', $previous->id)}}" rel="prev" role="button"><</a>
                @endif
                @if(isset($next))
                <a class="btn btn-outline-dark" href="{{ route('songs.show', $next->id)}}"rel="next" role="button">></a>
                @endif
            </div> 
      </div>
    </div>       
</div>         
@endsection