<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required'],
            'address' => ['required', 'email'],
            'body' => ['required'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();
        Mail::to('nello@bugmakers.com')->send(new NewContact($newLead));
        return response()->json([
            'success' => true
        ]);
    }
}