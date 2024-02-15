<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class CatService
{
    public function fetchCatInformation()
    {
        // Your service logic here
         //this is to get a random cat. 
         $response = Http::withHeaders([
            'X-API-Key' => 'live_4RwXzcioeTpNp7iDQhlgEsnmIVApLsrlNPWjfaV2iEyyRZJMzTOgYD9JXaGilwpH',
        ])->get('https://api.thecatapi.com/v1/images/search');
        
        if ($response->successful()) {
            return $response->json();
        } else {
            // Handle error response
            return [];
        }

    }
}
