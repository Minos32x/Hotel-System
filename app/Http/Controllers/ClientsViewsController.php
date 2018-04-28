<?php

namespace App\Http\Controllers;

use App\DataTables\ClientReservedDataTable;
use App\DataTables\ClientRoomsDataTable;
use App\Http\Requests\UpdateUserRequest;
use App\Reservation;
use App\Room;
use App\User;
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

    public function update(UpdateUserRequest $request, $id)
    {

        if (empty($request->file('avatar'))) {

            $image = User::find($id)->avatar;
        } else {

            $image = time() . '.' . $request->file('avatar')->getCLientOriginalName();
            Storage::putFileAs('public/avatars', $request->avatar, $image);
        }

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'country' => $request->country,
            'avatar' => $image

        ]);

        return redirect('client/profile');

    }


    public function showReservationForm()
    {
        return view('client.reservation_form');
    }


    public function create($id)
    {

        $capacity = Room::find($id)->capacity;
        return view('client.reservation_form', ['id' => $id,
            'room' => Room::find($id), 'capacity' => $capacity]);
    }


    public function confirm($id)
    {

        if (isset($_POST['stripeToken'])) {

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
            $amount = DB::table('rooms')->select('price')->where('id', $id)->first();
            $charge = \Stripe\Charge::create([
                'amount' => ($amount->price),
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
            ]);
        }
        Reservation::create([
            'client_id' => Auth::guard('web')->user()->id,
            'room_id' => $id,
            'price' => $amount,
            'num_company' => '5',

        ]);
        return redirect('/client/reservations');
    }

    public function showPayment(Request $request, $id)
    {
        $confirmed_number=$request->accompany_number;
        $request->validate(['accompany_number' => 'required']);
        $capacity = Room::find($id)->capacity;
        $max_num = Room::find($id)->capacity;
        $accompany = $request->accompany_number;
        $accompany = (int)$accompany;
        if ($max_num < $accompany) {
            return view('client.reservation_form', ['id' => $id,'capacity'=>$capacity])->with('error', "Wrong Validation Number");

        } else {

            return view('client.payment_form', ['room' => Room::find($id),'confirmed_number'=>$confirmed_number]);

        }
    }

    public function ClientBan($id)
    {

        User::find($id)->ban(['comment' => 'Enjoy your ban!']);
    }

    public function Clientunban($id)
    {
        User::find($id)->unban();
    }

}
