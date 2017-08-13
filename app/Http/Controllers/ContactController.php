<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;
use Session;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getcontact()
    {
        return view('client.pages.contact');
    }

    public function postcontact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required|email',
            'title' => 'required',
            'message' => 'required',
        ]);
        
        $requestData = $request->all();

        Contact::create($requestData);
        Session::flash('success', 'Cám ơn bạn đã liên hệ với chúng tôi');

        return redirect()->back();
    }
}
