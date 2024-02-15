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
    public function fetchSpecificCatInformation($catId)
    {
        // Your service logic here
        //this is to get a random cat. 
        $response = Http::withHeaders([
            'X-API-Key' => 'live_4RwXzcioeTpNp7iDQhlgEsnmIVApLsrlNPWjfaV2iEyyRZJMzTOgYD9JXaGilwpH',
            ])->get('https://api.thecatapi.com/v1/images/' . $catId);
            
            if ($response->successful()) {
                return $response->json();
            } else {
                // Handle error response
                return [];
            }
            
        }
        
        public function sendVoteInformation($imageId, $voteValue)
        {
            // Send a vote using the Cat API
            $response = Http::withHeaders([
                'X-API-Key' => 'live_4RwXzcioeTpNp7iDQhlgEsnmIVApLsrlNPWjfaV2iEyyRZJMzTOgYD9JXaGilwpH',
                ])->post('https://api.thecatapi.com/v1/votes', [
                    'image_id' => $imageId,
                    'value' => $voteValue,
                ]);
                // Check if the request was successful
                if ($response->successful()) {
                    // Vote submitted successfully
                    return true;
                } else {
                    // Failed to submit vote
                    return false;
                }
            }
            
            public function fetchVoteInformation()
            {
                // Your service logic here
                 //this is to get recent votes
                 $response = Http::withHeaders([
                    'X-API-Key' => 'live_4RwXzcioeTpNp7iDQhlgEsnmIVApLsrlNPWjfaV2iEyyRZJMzTOgYD9JXaGilwpH',
                ])->get('https://api.thecatapi.com/v1/votes?limit=10&order=DESC');
                
                if ($response->successful()) {
                    return $response->json();
                } else {
                    // Handle error response
                    return [];
                }
        
            }
        }
        