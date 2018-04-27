<?php

namespace App\Http\Controllers;

use App\DataTables\ClientReservedDataTable;
use App\DataTables\ClientRoomsDataTable;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Rinvex\Country\Models\country;

class ClientsViewsController extends Controller
{


    public function index()
    {
        return view('client.index');
    }

    public function profile()
    {
        $User = User::find(Auth::user()->id);
        return view('client.profile', ['user' => $User]);
    }

    public function showRooms()
    {
        $Reserve = new ClientRoomsDataTable(DB::table('rooms')->where('is_reserved', 0));
        return $Reserve->render('client.reservation');
    }


    public function showReserved()
    {
        $room = new ClientReservedDataTable(DB::table('reservations')->where('client_id', Auth::user()->id));
        return $room->render('client.reserved_rooms');
    }


    public function edit($id)
    {
        $countries = countries();
        $User = User::find($id);
        return view('client.editProfile', ['user' => $User,
            'countries' => $countries]);
    }

    public function update(UpdateUserRequest $req, $id)
    {

        $image = time() . $req->file('avatar');
        Storage::disk('public')->putFileAs('/avatars', $req->file('avatar'), $image);

        User::find($id)->update([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'gender' => $req->gender,
            'country' => $req->country,
            'avatar' => ($req->avatar == null ? 'avatar.jpg' : $image)

        ]);

        return redirect('client/profile');

    }


    public function showReservationForm()
    {
        return view('client.reservation_form');
    }


    public function create($id)
    {

        return view('client.reservation_form', ['room' => Room::find($id)]);
    }

    public function confirm($id)
    {

        return view('client.payment_form', ['room' => Room::find($id)]);
    }

    public function store($id)
    {
        if(isset($_POST['stripeToken']))
{
    
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_85Rd2lxhCpyYqchbpvfgEi1u");
$customer = \Stripe\Customer::create([
    'source' => 'tok_mastercard',
    'email' => $_POST['stripeEmail'],
]);

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
$amount=DB::table('rooms')->select('price')->where('id', $id)->first();
$charge = \Stripe\Charge::create([
    'amount' => ($amount->price),
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
]);
}

//store your data here ya minaaa

 return redirect('client/show');

}


}
