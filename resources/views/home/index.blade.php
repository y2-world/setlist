@extends('layouts.app')
@section('content')
<div class="cover">
    <div class="element js-fadein">
    <img src={{ asset('images/top_image.jpg') }}>
    <p><span>Yuki Yoshida</span> <span>Official Website</span></p>
    </div>
</div>
<div class="element js-fadein">
    <div class="topics">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <ul class="topic-menu">
                        <li><a href="#" class="active" data-id="menu-topics">TOPICS</a></li>
                        <li><a href="#" data-id="menu-release">NEW RELEASE</a></li>
                        <li><a href="#" data-id="menu-radio">RADIO</a></li>
                    </ul>
                    <hr>
                    <div class="topic-container">
                        <section class="content active" id="menu-topics">
                            @foreach ($news as $new)
                                <div class="topic-list">
                                    <div class="date">{{ date('Y.m.d', strtotime($new->date)) }}</div>
                                    <div class="topic"><a href="{{ route('news.show', $new->id) }}">{{$new->title}}</a></div>
                                </div>
                            @endforeach
                            <div class="topic-more">
                                <a href="{{ url('/news') }}">MORE</a>
                            </div>
                        </section>
                        <section class="content" id="menu-release">
                            @foreach ($discos as $disco)
                                <div class="topic-list">
                                    <div class="date">{{ date('Y.m.d', strtotime($disco->date)) }}</div>
                                    <div class="topic"><a href="{{ route('music.show', $disco->id) }}">{{$disco->title}}</a> - {{$disco->subtitle}}
                                    <span class="topic-text">{{$disco->text}}</span></div>
                                </div>
                            @endforeach
                            <div class="topic-more">
                                <a href="{{ url('/music') }}">MORE</a>
                            </div>
                        </section>
                        <section class="content" id="menu-radio">
                            @foreach ($radios as $radio)
                                <div class="topic-list">
                                    <div class="date">{{ date('Y.m.d', strtotime($radio->date)) }}</div>
                                    <div class="home-radio">
                                        <div class="topic">{{$radio->title}}</div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="topic-more">
                                <a href="{{ url('/radio') }}">MORE</a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   
