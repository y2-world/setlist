@extends('layouts.app')
@section('content')
<br>
<div class="container-lg">
  <h2>Tours</h2>
  <div class="parts-wrapper">
    <div class="dropdown-wrapper">
      <select name="select" onChange="location.href=value;">
        <option value="" disabled selected>Live</option>
        <option value="{{ url('/live')}}">All</option>
        <option value="{{ url('/tours')}}">Tours</option>
        <option value="{{ url('/events')}}">Events</option>
        <option value="{{ url('/apbankfes')}}">ap bank fes</option>
      </select>
      <select name="select" onChange="location.href=value;">
        <option value="" disabled selected>Years</option>
        @foreach ($bios as $bio)
        <option value="{{ url('/bios', $bio->id)}}">{{ $bio->year }}</option>
        @endforeach
      </select>
    </div>
    <div class="search">
      <form action="{{url('/find')}}" method="GET">
        <div class="input-group mb-3">
            <input type="search" class="form-control" aria-label="Search" value="{{request('keyword')}}" name="keyword" required>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </div>
      </form>
    </div>
  </div>
  <table class="table table-striped">
      <thead>
        <tr>
          <th class="mb_list">#</th>
          <th class="mb_list">開催日</th>
          <th class="mb_list">ツアータイトル</th>
        </tr>
      </thead>
      <div class="all-setlist">
        <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td>{{$tour->tour_id}}</td>
                    @if(isset($tour->date1) && isset($tour->date2))
                    <td>{{ date('Y.m.d', strtotime($tour->date1)) }} - {{ date('Y.m.d', strtotime($tour->date2)) }}</td>
                    @elseif(isset($tour->date1) && !isset($tour->date2))
                    <td>{{ date('Y.m.d', strtotime($tour->date1)) }}</td>
                    @endif
                    <td><a href="{{ route('tours.show', $tour->id) }}">{{ $tour->title }}</a></td>
                </tr>
            @endforeach
        </tbody>
      </div>
    </table>
  <div class=”pagination”>
    {!! $tours->links() !!}
  </div>
</div>
@endsection
