<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    $order_id = time().rand(10,100);
    $order_price = 1100;
    $precision = 2;
    $dapp_id = 1;
    $pay_url = "https://dogepay.top/payment/{$dapp_id}?trade_no={$order_id}&amount={$order_price}&precision={$precision}";
    return view('welcome', ['pay_url'=>$pay_url]);
});

Route::get('/callback', function(Request $request) {
    try {
        $tx = $request->get('tx');
        $test_net = 'https://horizon-testnet.stellar.org';
        $url = $test_net . "/transactions/{$tx}";
        // get transaction from horizon
        $content = json_decode(file_get_contents($url), true);
        if (isset($content['memo'])) {
            if ($content['memo_type'] == 'text') {
                // get order id from memo
                $order_id = substr($content['memo'], 8);
                // go to find order in database
                // $order = Order::find($order_id)
                $order = $order_id;
                if ($order) {
                    // get order price from transaction
                    $content = json_decode(file_get_contents($url.'/payments'), true);
                    if (isset($content['_embedded']['records'][0]['to'])) {
                        $from = $content['_embedded']['records'][0]['from'];
                        $to = $content['_embedded']['records'][0]['to'];
                        $amount_from_trans = $content['_embedded']['records'][0]['amount'];
                        // check if address is right
                        if ($to == 'GCTHN53A2RYRIU23IIW7ZOUKMOUSBELAYV5J4JMCHEMTULUSQOO2MVBD') {
                            // check if order amount is right
                            // $amount_from_db = $order->getAmount()*pow(10,5);
                            $amount_from_db = 1100 * pow(10, 5);
                            if ($amount_from_db == (int)$amount_from_trans * pow(10, 7)) {
                                // pay success
                                // update order status
                                return response("Order {$order} has been paid success!");
                            } else {
                                var_dump($amount_from_db, $amount_from_trans * pow(10, 7));
                                return response('Wrong amount.');
                            }
                        } else {
                            return response('Wrong address.');
                        }
                    } else {
                        return response('wrong response from horizon.');
                    }
                } else {
                    return response('order does not exist.');
                }
            } else {
                return response('transaction has not text memo.');
            }
        } else {
            return response('transaction has not memo.');
        }
    } catch (Exception $e) {
        return response($e->getMessage());
    }
});
