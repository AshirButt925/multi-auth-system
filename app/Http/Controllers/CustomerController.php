<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderHasWidget;
use App\Models\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function home()
    {
        return view('backend.customer.home');
    }

    public function placeOrderIndex()
    {
        return view('backend.customer.order.index');
    }

    public function placeOrderStore(Request $request)
    {
        $widgets = Widget::all();
        $order = $request['no_of_widgets'];

        $countWidgetsToSend = 0;
        $sumOfOrders = [];
        for ($countWidgetsToSend; array_sum($sumOfOrders) < $order; $countWidgetsToSend++) {
            if (isset($widgets[$countWidgetsToSend])) {
                $widget = (int)$widgets[$countWidgetsToSend]['value'];
                if ($order / $widget > 0) {
                    $roundValue = round($order / $widget);
                    if ($roundValue * $widget == $order) { //this conditions when exactly matched
                        $sumOfOrders[] = $roundValue * $widget;
                    } else {
                        $greaterThanWithPrevious = $widget + prev($widgets);
                        $greaterThanWithNext = $widget + next($widgets);
                        if ($greaterThanWithPrevious >= $greaterThanWithNext) {
                            $sumOfOrders[] = $greaterThanWithNext;
                        } else {
                            $sumOfOrders[] = $greaterThanWithPrevious;
                        }
                    }
                }
            } else {
                $countWidgetsToSend = 0;
            }
        }

        $order = Order::create([
            'customer_id' => Auth::user()->id
        ]);
        $widgets = Widget::whereIn('value', $sumOfOrders)->get();
        foreach ($widgets as $widget) {
            OrderHasWidget::create([
                'order_id' => $order->id,
                'widget_id' => $widget['id'],
            ]);
        }
        return redirect()->back()->with('success', 'order placed success');
    }
}
