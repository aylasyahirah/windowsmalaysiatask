<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::all();

        return view('customer.index')
            ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer.create');
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
        $pw = GeneralHelper::stringGenerator(6);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($pw)
        ]);
        $user->assignRole('customer');

        if ($user->save()) {

            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->identification_no = $request->icno;
            $customer->tel_phone_no = $request->telno;
            $customer->phone_no = $request->phone;
            $customer->office_phone_no = $request->officeno;
            $customer->occupation = $request->occupation;
            $customer->race = $request->race;
            $customer->religion = $request->religion;
            $customer->address_1 = $request->address_1;
            $customer->address_2 = $request->address_2;
            $customer->postcode = $request->postcode;
            $customer->city = $request->city;
            $customer->province = $request->province;
            if ($request->file('image')) {
                $path = $request->file('image')->store('public/images');
                $customer->image = $path;
            }
            $customer->note = $request->note;

            if ($customer->save()) {
                try {
                    $data = array('name' => $customer->name, 'tempPw' => $pw);
                    Mail::send('customer.mail', $data, function ($message) use ($user) {
                        $message->to($user->email)->subject('New Customer Registration');
                        $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME') . ' - No Reply');
                    });
                } catch (\Exception $e) {
                    print_r($e->getMessage());
                    exit();
                }
            }
        }

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
        $imagePath = str_replace("public", "storage", $customer->image);
        $image = url("/" . $imagePath);

        return view('customer.show')
            ->with('customer', $customer)
            ->with('path', $image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        $imagePath = str_replace("public", "storage", $customer->image);
        $image = url("/" . $imagePath);
        return view('customer.edit')
            ->with('customer', $customer)
            ->with('path', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->identification_no = $request->icno;
        $customer->tel_phone_no = $request->telno;
        $customer->phone_no = $request->phone;
        $customer->office_phone_no = $request->officeno;
        $customer->occupation = $request->occupation;
        $customer->race = $request->race;
        $customer->religion = $request->religion;
        $customer->address_1 = $request->address_1;
        $customer->address_2 = $request->address_2;
        $customer->postcode = $request->postcode;
        $customer->city = $request->city;
        $customer->province = $request->province;
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/images');
            $customer->image = $path;
        }
        $customer->note = $request->note;
        $customer->update();

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        $user = User::find($customer->user_id);

        if ($user->delete()) {
            $customer->delete();
        }

        return redirect('customer');
    }
}
