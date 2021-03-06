@extends('layouts.app')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="setlist">
            @if($singles->download == 0)
            # {{$singles->single_id}}
            @else
            Download Single
            @endif
          </div>
          <h3> {{$singles->title}}</h3>
          <div class="setlist">
            Release Date : {{ date('Y.m.d', strtotime($singles->date)) }}
            <hr>
            @if(isset($singles->tracklist))
              @foreach ($singles->tracklist as $data)
                @if(isset($data['song']))
                {{ $data['#'] }}. <a href="{{ url('songs', $data['id'])}}">{{ $data['song'] }}</a><br>
                @elseif(isset($data['id']) && isset($data['exception']))
                  {{ $data['#'] }}. <a href="{{ url('songs', $data['id'])}}">{{ $data['exception'] }}</a><br>
                @elseif(!isset($data['id']) && isset($data['exception']))
                  {{ $data['#'] }}. {{ $data['exception'] }}<br>
                @endif
              @endforeach
              <br>
            @endif
            @if(!is_null($singles->text))
            {!! nl2br(e($singles->text)) !!}
            @endif
          </div>
          <br>
          <div class="show_button">
            @if(isset($previous))
            <a class="btn btn-outline-dark" href="{{ route('singles.show', $previous->id)}}" rel="prev" role="button"><</a>
            @endif
            @if(isset($next))
            <a class="btn btn-outline-dark" href="{{ route('singles.show', $next->id)}}"rel="next" role="button">></a>
            @endif
          </div> 
        </div>
    </div>       
</div>         
@endsection