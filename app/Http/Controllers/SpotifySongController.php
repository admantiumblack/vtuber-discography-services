<?php

namespace App\Http\Controllers;

use Aerni\Spotify\Spotify;
use App\Utils\Metadata;
use Illuminate\Http\Request;

class SpotifySongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $query = $request->query();
        $url = $request->url();

        $songs = (new Spotify(['country' => null, 'locale' => null, 'market' => null]))
            ->albumTracks($id)
            ->limit($query['limit'])
            ->offset($query['offset'])
            ->get();

        $metadata = Metadata::generate_metadata($url, $query, $request);

//        dd($songs);

        return response()->json([
            'data' => $songs,
            'meta' => $metadata,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
