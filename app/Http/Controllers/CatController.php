<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\CatService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $catService;

     public function __construct(CatService $catService)
     {
         $this->catService = $catService;
     }
     //test init
    
    public function index()
    {

        // Fetch cat information using the CatService
        $cats = $this->catService->fetchCatInformation();
       return view('components.cats', ['cats' => $cats]);

    }


    public function vote(Request $request, $catId){
        // Validate the request data (e.g., check if vote data is present)
        $request->validate([
            'vote' => 'required',
        ]);

        // Get the vote data from the request
        $vote = $request->input('vote');

        // Example: Send vote to Cat API
        $response = Http::post("https://api.thecatapi.com/v1/votes", [
            'image_id' => $catId,
            'value' => $vote == 'upvote' ? 1 : -1, // Convert 'upvote' to 1, 'downvote' to 0
        ]);

        // Check if the vote was successfully submitted to the Cat API
        if ($response->successful()) {
            // Store voting information in the cache for 30 minutes
            Cache::put('cat_votes_' . $catId, $vote, now()->addMinutes(30));

            // Return success response
            return response()->json(['message' => 'Vote recorded successfully']);
        } else {
            // Return error response
            return response()->json(['error' => 'Failed to record vote'], $response->status());
        }
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
