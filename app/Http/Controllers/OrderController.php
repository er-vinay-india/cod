<?php

namespace App\Http\Controllers;

use App\Entities\Factory;
use Illuminate\Http\Request;
use App\Managers\OrderManager;
use App\Entities\Order;

class OrderController extends Controller
{
    public function get(Request $request, ...$arg)
    { // Learn About (...) opertor

        if (!isset($arg[0])) {
            return response()->json([
                'status' => 'success',
                'result' => []
            ]);
        }

        $offset = $request->input('offset') ? $request->input('offset') : 0;
        $limit = $request->input('limit') ? $request->input('limit') : 1;

        /** @var App\Managers\OrderManager $manager */
        $manager = new OrderManager();

        switch ($arg[0]) {
            case 'all':

                $options = [
                    'limit' => $limit,
                    'offset' => $offset
                ];

                // all products
                $orders = $manager->getAll($options);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'orders' => $orders
                    ],
                ]);
                break;
            case 'single':
                // single product 
                $guid = $arg[1];
                $order = $manager->get($guid);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'order' => $order
                    ],
                ]);
                break;
        }
    }

    public function add(Request $request)
    {
        /** @var \App\Managers\OrderManager */
        $manager = new OrderManager();

        /** @var \App\Entities\Order */
        $order = Factory::build('order');

        if ($request->post('promo_applied')) {
            $order->setPromoApplied($request->post('promo_applied'));
        }

        if ($request->post('order_id')) {
            $order->setOrderId($request->post('order_id'));
        }

        if ($request->post('order_product')) {
            $order->setOrderProduct($request->post('order_product'));
        }

        if ($request->post('total_price')) {
            $order->setTotalPrice($request->post('total_price'));
        }

        if ($request->post('status')) {
            $order->setStatus($request->post('status'));
        }

        if ($request->post('time_created')) {
            $order->setTimeCreated($request->post('time_created'));
        }

        if ($request->post('time_updated')) {
            $order->setTimeUpdated($request->post('time_updated'));
        }


        $manager->save($order);

        return response()->json([
            'status' => 'success',
            'result' => [
                'message' => 'User added successfully!'
            ]
        ]);
    }

    public function updateStatus(Request $request) {
        $manager = new OrderManager();
        /** @var \App\Entities\Order $order */
        $order = $manager->get($request->post('order_guid'));
        $order->setStatus($request->post('status'));
        $manager->save($order);
    }
}
