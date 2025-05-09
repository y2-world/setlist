@extends('layouts.app')
@section('title', 'Yuki Official - ' . $year->year)
@section('content')
    <br>
    <div class="container-lg">
        <h2>{{ $year->year }}</h2>
        <div class="parts-wrapper">
            <div class="dropdown-wrapper">
                <select name="select" onChange="location.href=value;">
                    <option value="" disabled selected>Artists</option>
                    @foreach ($artists as $artist)
                        <option value="{{ url('/setlists/artists', $artist->id) }}">{{ $artist->name }}</option>
                    @endforeach
                </select>
                <select name="select" onChange="location.href=value;">
                    <option value="" disabled selected>Years</option>
                    @foreach ($years as $year)
                        <option value="{{ url('/setlists/years', $year->year) }}">{{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="pc">
                <div class="search">
                    <form action="{{ url('/search') }}" method="GET">
                        <div class="mb_dropdown">
                            <select name="artist_id" required data-toggle="select">
                                <option value="" disabled selected>Artists</option>
                                @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}" required>{{ $artist->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" aria-label="Search" value="{{ request('keyword') }}"
                                name="keyword" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped count">
            <thead>
                <tr>
                    <th class="mobile">#</th>
                    <th class="mobile">開催日</th>
                    <th class="pc">アーティスト</th>
                    <th class="sp">アーティスト / タイトル</th>
                    <th class="pc">タイトル</th>
                    <th class="pc">会場</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($setlists as $setlist)
                    <tr>
                        <td></td>
                        <td>{{ date('Y.m.d', strtotime($setlist->date)) }}</td>
                        @if (isset($setlist->artist_id))
                            <td class="pc">
                                <a
                                    href="{{ url('/setlists/artists', $setlist->artist_id) }}">{{ $setlist->artist->name }}</a>
                            </td>
                            <td class="sp">
                                <a
                                    href="{{ url('/setlists/artists', $setlist->artist_id) }}">{{ $setlist->artist->name }}</a>
                                /
                                <a href="{{ route('setlists.show', $setlist->id) }}">{{ $setlist->title }}</a>
                            </td>
                        @else
                            <td class="pc"></td>
                            <td class="sp"><a
                                    href="{{ route('setlists.show', $setlist->id) }}">{{ $setlist->title }}</a></td>
                        @endif
                        <td class="pc"><a href="{{ route('setlists.show', $setlist->id) }}">{{ $setlist->title }}</a>
                        </td>
                        <td class="pc"><a
                                href="{{ url('/venue?keyword=' . urlencode($setlist->venue)) }}">{{ $setlist->venue }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    </div>
    </div>
@endsection

@section('page-script')
<script src="{{ asset('/js/search.js?time=' . time()) }}"></script>
@endsection
