<?php

namespace App\Http\Controllers;

use Stripe;
use http\Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['stripe_key' => getenv('STRIPE_API_PUBLIC_KEY')]);
    }

    public function purchase(Request $request)
    {
        $request = $request->all();

        try {
            $token  = $request['stripeToken'];
            $email  = $request['stripeEmail'];

            $customer = Stripe::customers()->create(array(
                'email' => $email,
                'source'  => $token
            ));

            $order = Stripe::orders()->create([
                'currency' => 'usd',
                'customer' => $customer['id'],
                'items' => [
                    [
                        'type'   => 'sku',
                        'parent' => 'north-wind-book',
                    ],
                ],
                'shipping' => [
                    'name'    => $request['name'],
                    'address' => [
                        'line1'       => $request['address'],
                        'city'        => $request['city'],
                        'country'     => $request['state'],
                        'postal_code' => $request['zip'],
                    ],
                ],
                'email' => $email
            ]);

        } catch(Exception $exception) {
            return redirect()
                ->action('HomeController@index')
                ->with('error', $exception->getMessage());
        }

        return redirect()
            ->action('HomeController@index')
            ->with('success', 'Thanks for purchasing North Wind! Your order number is ' . $order['id'] . '.');

    }
}