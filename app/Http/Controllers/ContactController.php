<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email:rfc,dns', 'unique:contacts'],
            'phone' => ['required', 'numeric', 'digits:9', 'unique:contacts'],
        ]);
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email =  $request->input('email');
        $contact->user_id = auth()->user()->id;
        $contact->save();
        return redirect('/contact')->with('success', 'Contact <strong>'.$contact->name.'</strong> created with success');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contact.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        if(Auth::user()->id != $contact->user_id)abort('404');
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email:rfc,dns', Rule::unique('contacts')->ignore(auth()->user()->id, 'user_id')],
            'phone' => ['required', 'numeric', 'digits:9', Rule::unique('contacts')->ignore(auth()->user()->id, 'user_id')],
        ]);
        $contact = Contact::findOrFail($id);
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email =  $request->input('email');
        $contact->user_id = auth()->user()->id;
        $contact->save();
        return redirect('/contact')->with('success', 'Contact <strong>'.$contact->name.'</strong> edited with success');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect('/contact')->with('success', 'Contact <strong>'.$contact->name.'</strong> deleted with success');
    }
}
