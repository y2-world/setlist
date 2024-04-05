@extends('layouts.app')
@section('content')
<?php
$today = strtotime(date('Y-m-d'));
?>
<div class="cover">
    <div class="element js-fadein">
        <img src={{ asset('images/top_image.jpg') }}>
        <p><span>Yuki Yoshida</span> <span>Official Website</span></p>
    </div>
</div>

<div class="index-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <!-- <div class="element js-fadein"> -->
                <h2 class="news-title">New Release</h2>
                <div class="cover-wrapper">
                    @foreach ($discos as $disco)
                    <div class="disc-block">
                        <a href="{{ route('music.show', $disco->id) }}"><img src={{ asset('https://res.cloudinary.com/hqrgbxuiv/'. $disco->image) }} class="top-image"></a>
                        <br><br>
                        <div class="topic"><a href="{{ route('music.show', $disco->id) }}">{{$disco->title}}</a></div>
                        <p class="topic">{{ date('Y.m.d', strtotime($disco->date)) }} - {{$disco->subtitle}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="topic-more">
                <a href="{{ url('/music') }}">View All</a>
            </div>
            <!-- </div> -->
        </div>
        <br>
    </div>
</div>
</div>

<div class="index-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="element js-fadein">
                    <h2 class="news-title">News</h2>
                    @foreach ($news as $new)
                    @if($new->visible != 1)
                        <a href="{{ route('news.show', $new->id) }}">
                            <div class="topic-title"> 
                            <hr>
                                <div class="date">{{ date('Y.m.d', strtotime($new->date)) }}</div>
                                {{$new->title}}
                            </div>
                        </a>
                    @endif
                    @endforeach
                    <hr>
                    <div class="topic-more">
                        <a href="{{ url('/news') }}">View All</a>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="index-wrapper" id="profile">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="element js-fadein">
                    <h2>Profile</h2>
                    <div class="row">
                        @if($profiles)
                        @foreach ($profiles as $profile)
                        <div class="col-lg-6 my-auto">
                            <div class="prof_img">
                                <img src={{ asset('https://res.cloudinary.com/hqrgbxuiv/'. $profile->image) }} class="image" width="80%">
                            </div>
                        </div>
                        <div class="col-lg-5 my-auto">
                            <br>
                            <h2>{{$profile->name}}</h2>
                            <p class="profile-info">{{$profile->info}}</p>
                            <hr>
                            <p class="profile-text">{!! nl2br(e($profile->text)) !!}</p>
                            <hr>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="index-wrapper" id="radio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="element js-fadein">
                    <h2>Radio</h2>
                    <div class="radio-wrapper">
                        <iframe src="https://embed.podcasts.apple.com/us/podcast/y2-radio/id1555086566?itsct=podcast_box_player&amp;itscg=30200&amp;ls=1&amp;theme=light" height="450px" frameborder="0" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation" allow="autoplay *; encrypted-media *; clipboard-write" style="width: 100%; max-width: 1080px; overflow: hidden; border-radius: 10px; background: transparent;"></iframe>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<div class="footer-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-11">
                <div class="footer">
                    <div class="footer-title">
                        Yuki Yoshida Official Website
                    </div>
                    <a href="{{ url('/news') }}">News</a>・
                    <a href="{{ url('/music') }}">Music</a>・
                    <a href="{{ url('/#profile') }}">Profile</a>・
                    <a href="{{ url('/#radio') }}">Radio</a>・
                    <a href="{{ url('https://ameblo.jp/y2-world') }}" target="_blank">Blog</a>
                    <br>
                    <div class="footer-copyright">©2024 y2_record inc.</div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection