<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::paginate(30);
        
        return view('dashboard.index', ['users' => $users]);
    }

    public function api()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://149.129.217.146/jubelio/api/all/products/stock',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $response = array(
            'status' => json_decode($response)->status,
            'message' => json_decode($response)->message,
            'data' => json_decode($response)->data            
        );
        // dd($response['status']);
        return view('api.index', ['response' => $response]);
    }
}
