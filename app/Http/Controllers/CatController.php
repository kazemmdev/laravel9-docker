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

    public function index()
    {

        // Fetch cat information using the CatService
        $cats = $this->catService->fetchCatInformation();
        $votes = $this->catService->fetchVoteInformation();
        [$cat_obj] = $cats;
        return view('components.cats', ['cats' => $cat_obj, 'votes' => $votes]);
    }


    public function vote(Request $request)
    {
        // Validate the request data (e.g., check if vote data is present)


        // Get the  data from the request
        $vote = $request->input('vote');
        $catId = $request->input('image_id');

        // Example: Send vote to Cat API
        $votes = $this->catService->sendVoteInformation($catId, $vote);

        // Check if the vote was successfully submitted to the Cat API
        if ($votes) {
            // Store voting information in the cache for 30 minutes
            Cache::put('cat_votes_' . $catId, $vote, now()->addMinutes(30));

            // Return success response
            $cats =  $cats = $this->catService->fetchSpecificCatInformation($catId);
            $votes = $this->catService->fetchVoteInformation();

          return view('components.cats', ['cats' => $cats, 'votes' => $votes]);

        } else {
            // Return error response
            return redirect()->route('index');
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
