<?php

namespace App\Http\Controllers;

use App\Contact;
use App\ContactPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show', compact('contact'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $contact = new Contact();

        if($request->id == strtolower('truncate')) {
            $contact->truncate();
        } else {
            $contact->where('id', $request->id)->delete();
        }
        return redirect('control/contact')->with('success', 'Message deleted!');
    }

    public function display() {
        $pageContent = ContactPage::first();
        return view('admin.contact.display', compact('pageContent'));
    }

    public function addForm() {
        $pageContent = new ContactPage();
        return view('admin.contact.create', compact('pageContent'));
    }

    public function added(Request $request) {
        $contactPage = ContactPage::create($this->validateRequest());
        $this->storeImage($contactPage);
        return redirect('/control/contact/page/index')->with('success', 'Content add successfully');
    }

    public function editFrom() {
        $pageContent = ContactPage::find(request()->id);
        return view('admin.contact.edit', compact('pageContent'));
    }

    public function change(Request $request) {
        $contactPage = ContactPage::where('id', $request->id)->first();

        //Delete previous image from directory
        if(request()->hasFile('image')){
            Storage::delete('public/'.$contactPage->image);
        }

        $contactPage->update($this->validateRequest());
        $this->storeImage($contactPage);

        return redirect('/control/contact/page/index')->with('success', 'Content updated');
    }

    //Store image
    private function  storeImage($contactPage) {
        if (request()->hasFile('image')) {
            $contactPage->update ([
                'image' => request()->file('image')->store('contact','public'),
            ]);
            Image::make(public_path('storage/'.$contactPage->image))->resize(1920,1080)->save();
        }
    }

    //Request validation
    private function validateRequest() {
        return tap(request()->validate([
            'image'         => 'nullable|image|mimes:png,jpeg,jpg,gif|max:2048',
            'page_title'    => 'required|string|max:100',
            'description'   => 'nullable|string',
            'address'       => 'required|string|max:120',
            'email'         => 'required|string|max:50',
            'contact'       => 'required|string|max:16',
        ]), function () {
            if(request()->method() == 'POST'){
                request()->validate([
                    'image'     => 'required|mimes:jpeg,jpg,png,gif|max:2048',
                ]);
            }
        });

    }
}
