<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Disco;
use App\Models\Profile;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('visible', 0)->orderBy('date', 'desc')
            ->paginate(5);
        $discos = Disco::where('visible', 0)->orderBy('date', 'desc')
            ->paginate(5);
        $profiles = Profile::orderBy('created_at', 'desc')
            ->get();
        return view('home.index', compact('news', 'discos', 'profiles'));
    }

    // 全ニュースを取得して返す
    public function getAllNews()
    {
        // ニュースを取得するクエリを確認
        $news = News::where('visible', '!=', 1)
            ->orderBy('date', 'desc')
            ->get(['id', 'title', 'date']); // 必要なカラムのみ取得

        // デバッグ用ログ
        if ($news->isEmpty()) {
            return response()->json(['message' => 'No news found.'], 404);
        }

        return response()->json([
            'top' => $news,
        ]);
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
        //
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
