@extends('layouts.app')
@section('content')
<div class="mt-4"></div>
<div class="news">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="element js-fadein">
                    <small class="date">{{ date('Y.m.d', strtotime($news->date)) }}</small>
                    <h4>{{$news->title}}</h4>
                    <hr>
                    @if(isset($news->image))
                    <div class="row">
                        <div class="col-xl-6">
                            <?= html_entity_decode($news->text); ?>
                        </div>
                        <div class="col-xl-6">
                            <div class="news-img">
                                <img src={{ asset('https://res.cloudinary.com/hqrgbxuiv/'. $news->image) }} class="news-image" width="100%">
                            </div>
                        </div>
                    </div>
                    @else
                    <?= html_entity_decode($news->text); ?>
                    @endif
                    <div class="show_button">
                        {{-- @if(isset($previous))
                        <a class="btn btn-outline-dark" href="{{ route('news.show', $previous->id)}}" rel="prev" role="button"><</a>
                        @endif --}}
                        <a class="btn btn-outline-dark" href="#" onclick="window.history.back(); return false;">BACK</a>
                        {{-- @if(isset($next))
                        <a class="btn btn-outline-dark" href="{{ route('news.show', $next->id)}}" rel="next" role="button">></a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection