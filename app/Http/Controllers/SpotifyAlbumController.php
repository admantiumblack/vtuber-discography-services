<?php

namespace App\Http\Controllers;

use Aerni\Spotify\Spotify;
use App\Models\VtuberSpotify;
use App\Utils\Metadata;
use Illuminate\Http\Request;

class SpotifyAlbumController extends Controller
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

        $artist = VtuberSpotify::find($id);
        $id = $artist ->spotify_id;

        $albums = (new Spotify(['country' => null, 'locale' => null, 'market' => 'ID']))
            ->artistAlbums($id)
            ->includeGroups($query['include_groups'])
            ->limit($query['limit'])
            ->offset($query['offset'])
            ->get();

        $metadata = Metadata::generate_metadata($url, $query, $request);

        return response()->json([
            'data' => $albums,
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
