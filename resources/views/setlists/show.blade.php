@extends('layouts.app')
@section('title', 'Yuki Official - ' . $setlists->title)
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="setlist_artist">
                    @if ($setlists->fes == false)
                        <a href="{{ url('/setlists/artists', $setlists->artist_id) }}">{{ $setlists->artist->name }}</a>
                    @endif
                </div>
                <div class="setlist_title">{{ $setlists->title }}</div>
                <div class="setlist_info">
                    {{ date('Y.m.d', strtotime($setlists->date)) }}
                    <br>
                    <a href="{{ url('/venue?keyword=' . urlencode($setlists->venue)) }}">{{ $setlists->venue }}</a>
                </div>
                <hr>
                @if ($setlists->fes == 0)
                    <ol class="setlist">
                        @foreach ($setlists->setlist as $data)
                            @if (!empty($data['#']))
                                @if ($data['#'] === '-')
                                    {{ $data['#'] }} <a
                                        href="{{ url('/search?artist_id=' . $setlists->artist_id . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a><br>
                                @else
                                    <li><a
                                            href="{{ url('/search?artist_id=' . $setlists->artist_id . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                    </li>
                                @endif
                            @else
                                <li><a
                                        href="{{ url('/search?artist_id=' . $setlists->artist_id . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                </li>
                            @endif
                        @endforeach
                        @if (!empty($setlists->encore))
                            <hr width="250">
                            @foreach ((array) $setlists->encore as $data)
                                @if (!empty($data['#']))
                                    @if ($data['#'] === '-')
                                        {{ $data['#'] }} <a
                                            href="{{ url('/search?artist_id=' . $setlists->artist_id . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a><br>
                                    @else
                                        <li><a
                                                href="{{ url('/search?artist_id=' . $setlists->artist_id . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li><a
                                            href="{{ url('/search?artist_id=' . $setlists->artist_id . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ol>
                @elseif($setlists->fes == 1)
                    @foreach ((array) $setlists->fes_setlist as $key => $data)
                        @if (!empty($data['artist']))
                            @if ($key != 0)
                                @if ($setlists->fes_setlist[$key]['artist'] != $setlists->fes_setlist[$key - 1]['artist'])
                                    </ol>
                                    <ol class="setlist">
                                        {{-- {{ $artists[$data['artist'] - 1]['name'] }}<br> --}}
                                        <a
                                            href="{{ url('/setlists/artists', $data['artist']) }}">{{ $artists[$data['artist'] - 1]['name'] }}</a><br>
                                        <li><a
                                                href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                        </li>
                                    @else
                                        <li><a
                                                href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                        </li>
                                @endif
                            @else
                                <ol class="setlist">
                                    <a
                                        href="{{ url('/setlists/artists', $data['artist']) }}">{{ $artists[$data['artist'] - 1]['name'] }}</a><br>
                                    <li><a
                                            href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                    </li>
                            @endif
                        @else
                            <li><a
                                    href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                            </li>
                            </ol>
                        @endif
                    @endforeach
                    </ol>

                    @if (!empty($setlists->fes_encore))
                        <hr width="250">
                        @foreach ((array) $setlists->fes_encore as $key => $data)
                            @if (!empty($data['artist']))
                                @if ($key != 0)
                                    @if ($setlists->fes_encore[$key]['artist'] != $setlists->fes_encore[$key - 1]['artist'])
                                        </ol>
                                        <ol class="setlist">
                                            <a
                                                href="{{ url('/setlists/artists', $data['artist']) }}">{{ $artists[$data['artist'] - 1]['name'] }}</a><br>
                                            <li><a
                                                    href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                            </li>
                                        @else
                                            <li><a
                                                    href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                            </li>
                                    @endif
                                @else
                                    <ol class="setlist">
                                        <a
                                            href="{{ url('/setlists/artists', $data['artist']) }}">{{ $artists[$data['artist'] - 1]['name'] }}</a><br>
                                        <li><a
                                                href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                        </li>
                                @endif
                            @else
                                <li><a
                                        href="{{ url('/search?artist_id=' . $data['artist'] . '&keyword=' . urlencode($data['song'])) }}">{{ $data['song'] }}</a>
                                </li>
                                </ol>
                            @endif
                        @endforeach
                    @endif
                @elseif($setlists->fes == 2)
                    <ol class="setlist">
                        @foreach ((array) $setlists->fes_setlist as $key => $data)
                            @if (!empty($data['corner']))
                                @if ($key != 0)
                                    @if ($setlists->fes_setlist[$key]['corner'])
                                        <br>{{ $data['corner'] }}<br>
                                        <li> {{ $data['song'] }}</li>
                                    @else
                                        <li> {{ $data['song'] }}</li>
                                    @endif
                                @else
                                    {{ $artists[$data['artist'] - 1]['corner'] }}<br>
                                    <li> {{ $data['song'] }}</li>
                                @endif
                            @elseif (!empty($data['artist']))
                                @if ($key != 0)
                                    @if ($setlists->fes_setlist[$key]['artist'] != $setlists->fes_setlist[$key - 1]['artist'])
                                        <br>{{ $artists[$data['artist'] - 1]['name'] }}<br>
                                        <li> {{ $data['song'] }}</li>
                                    @else
                                        <li> {{ $data['song'] }}</li>
                                    @endif
                                @else
                                    {{ $artists[$data['artist'] - 1]['name'] }}<br>
                                    <li> {{ $data['song'] }}</li>
                                @endif
                            @else
                                <li> {{ $data['song'] }}</li>
                            @endif
                        @endforeach
                        @if (!empty($setlists->fes_encore))
                            <hr width="250">
                            @foreach ((array) $setlists->fes_encore as $key => $data)
                                @if (!empty($data['corner']))
                                    @if ($key != 0)
                                        @if ($setlists->fes_encore[$key]['corner'] != $setlists->fes_encore[$key - 1]['corner'])
                                            <br>{{ $artists[$data['artist'] - 1]['corner'] }}<br>
                                            <li> {{ $data['song'] }}</li>
                                        @else
                                            <li> {{ $data['song'] }}</li>
                                        @endif
                                    @else
                                        <a
                                            href="{{ url('/setlists/artists', $data['artist'] - 1) }}">{{ $artists[$data['artist'] - 1]['name'] }}</a><br><br>
                                        <li> {{ $data['song'] }}</li>
                                    @endif
                                @else
                                    <li> {{ $data['song'] }}</li>
                                @endif
                            @endforeach
                        @endif
                    </ol>
                @endif
                <div class="show_button">
                    @if (!empty($previous))
                        <a class="btn btn-outline-dark" href="{{ route('setlists.show', $previous->id) }}" rel="prev"
                            role="button"><</a>
                    @endif
                    @if (!empty($next))
                        <a class="btn btn-outline-dark" href="{{ route('setlists.show', $next->id) }}"rel="next"
                            role="button">></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection