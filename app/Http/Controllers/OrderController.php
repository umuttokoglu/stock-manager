<?php

namespace App\Http\Controllers;

use App\Constants\RouteNameConstants;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): Factory|View|Application
    {
        $orders = Order::with(['product', 'customer'])->get();

        return view('pages.admin.orders.index', compact('orders'));
    }

    public function create(): Factory|View|Application
    {
        $products = Product::get([
            'id',
            'name'
        ]);
        $customers = Customer::all([
            'id',
            'name',
            'firm_name'
        ]);

        return view('pages.admin.orders.form', compact('products', 'customers'));
    }

    public function store(OrderStoreRequest $request)
    {
        $product = Product::find($request->get('product_id'))->first();

        if ($request->amount > $product->amount) {
            return back()
                ->with('message', 'Seçtiğiniz ürünün stok miktarından fazla sipariş girişi yaptınız. Kontrol ediniz.');
        }

        Order::create($request->validated());

        $product->update([
            'amount' => $product->amount - $request->get('amount'),
        ]);

        return response()->redirectToRoute(RouteNameConstants::ORDERS);
    }

    public function show(Order $order)
    {
        abort(404);
    }

    public function edit(Order $order): Factory|View|Application
    {
        return view('pages.admin.orders.edit', compact('order'));
    }

    public function update(OrderUpdateRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());

        return response()->redirectToRoute(RouteNameConstants::ORDERS);
    }

    public function destroy(Order $order)
    {
        abort(404);
    }
}
