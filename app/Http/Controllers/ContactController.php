<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CreateContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.create');
    }

    public function view(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        return view('contact.view', compact('contact'));
    }

    public function store(CreateContactRequest $request)
    {

        $image = $request->file('image');
       
        if ($image) {

        $image_ext = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/user/' . $image_ext);
        $image_path = 'upload/user/' . $image_ext;
            
        Contact::create([


        'user_id' => Auth::id(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'birthday' => $request->birthday,
        'image' => $image_path,
        'email' => $request->email,
        'email_2' => $request->email_2,
        'address' => $request->address,
        'phone' => $request->phone,
        'phone_2' => $request->phone_2,
        'department' => $request->department,
        'company' => $request->company,
        'company' => $request->company_phone,
        'created_at' => now()

       ]);

       return redirect()->to('dashboard')->with('success', 'Contact has been updated.');

        } else {
            
        Contact::create([
            
        'user_id' => Auth::id(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'birthday' => $request->birthday,
        'email' => $request->email,
        'email_2' => $request->email_2,
        'address' => $request->address,
        'phone' => $request->phone,
        'phone_2' => $request->phone_2,
        'department' => $request->department,
        'company' => $request->company,
        'company' => $request->company_phone,
        'created_at' => now()

       ]);

       return redirect()->to('dashboard')->with('success', 'Contact has been updated.');
        }
        

    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('contact.edit', compact('contact'));
    }

    public function update(CreateContactRequest $request, $id)
    {

        $old_image = $request->old_image;

        $image = $request->file('image');

        if ($image) {

        $image_ext = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/user/' . $image_ext);
        $image_path = 'upload/user/' . $image_ext;

        unlink($old_image);
            
        Contact::findOrFail($id)->update([

        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'birthday' => $request->birthday,
        'image' => $image_path,
        'email' => $request->email,
        'email_2' => $request->email_2,
        'address' => $request->address,
        'phone' => $request->phone,
        'phone_2' => $request->phone_2,
        'department' => $request->department,
        'company' => $request->company,
        'company' => $request->company_phone,
        'updated_at' => now()
       ]);

       return redirect()->to('dashboard')->with('success', 'New contact has been added.');

        } else {
            
        Contact::findOrFail($id)->update([

        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'birthday' => $request->birthday,
        'email' => $request->email,
        'email_2' => $request->email_2,
        'address' => $request->address,
        'phone' => $request->phone,
        'phone_2' => $request->phone_2,
        'department' => $request->department,
        'company' => $request->company,
        'company' => $request->company_phone,
        'updated_at' => now()

       ]);

       return redirect()->to('dashboard')->with('success', 'New contact has been added.');
        }
        

       
    }

    public function delete($id)
    {
        $image = Contact::findOrFail($id);

        $old_image = $image->image;

        if ($old_image) {

        unlink($old_image);
        Contact::findOrFail($id)->delete();

        } else {
            
            Contact::findOrFail($id)->delete();
        }

        return back();
    }

    public function favouriteContact(Request $request, $contact_id)
    {
        // $rates = explode(',', $request->rate);

        // dd( $rate[1]);
        //  foreach ($rates as $key => $rate) {
            # code...
            $favourite = Contact::findOrFail($contact_id)->update([
                'favourite' => $request->rate,
                'updated_at' => now()
            ]);
        //  }

        return json_encode($favourite);
   
    }

    public function viewFavouriteContact()
    {
        $contacts = Contact::with('user')->where(['user_id' => Auth::id(), 'favourite' => '1'])->get();
        return view('contact.favourite', compact('contacts'));
    }
}
