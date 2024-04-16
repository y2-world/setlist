<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Setlist;
use App\Models\Year;
use Illuminate\Http\Request;

class SetlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $setlists = Setlist::orderBy('date', 'desc')
        // ->paginate(10);
        // $artists = Artist::where('visible', 0)->orderBy('id', 'asc')
        // ->get();
        // $allArtists = Artist::orderBy('id', 'asc')
        // ->get();
        // $years = Year::orderBy('year', 'asc')
        // ->get();
        // return view('setlists.index', compact('artists', 'allArtists', 'setlists', 'years'));

        $liveType = request()->input('live_type');

        // クエリビルダーを生成し、セットリストを取得する
        $setlistsQuery = Setlist::orderBy('date', 'desc');
    
        if ($liveType === '1') {
            // live_typeが1の場合はfesカラムが0のセットリストを取得する
            $setlistsQuery->where('fes', 0);
        } elseif ($liveType === '2') {
            // live_typeが2の場合はfesカラムが1か2のセットリストを取得する
            $setlistsQuery->whereIn('fes', [1, 2]);
        }
    
        // ページネーションを適用してセットリストを取得する
        $setlists = $setlistsQuery->paginate(10);
    
        // アーティスト、全てのアーティスト、年のデータを取得する
        $artists = Artist::where('visible', 0)->orderBy('id', 'asc')->get();
        $allArtists = Artist::orderBy('id', 'asc')->get();
        $years = Year::orderBy('year', 'asc')->get();
    
        // ビューにデータを渡して表示する
        return view('setlists.index', compact('artists', 'allArtists', 'setlists', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setlists = Setlist::find($id);
        $artists = Artist::orderBy('id', 'asc')
        ->get();
        $previous = Setlist::where('date', '<', $setlists->date)->orderBy('date', 'desc')->first();
        $next = Setlist::where('date', '>', $setlists->date)->orderBy('date')->first();
        
        return view('setlists.show', compact('artists', 'setlists', 'previous', 'next'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
