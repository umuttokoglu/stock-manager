<?php

namespace App\Http\Controllers;

use App\Constants\RouteNameConstants;
use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): Factory|View|Application
    {
        $customers = Customer::orderByDesc('created_at')
            ->get([
                'id',
                'name',
                'firm_name',
                'tax_administration',
                'tax_no',
                'phone',
                'address',
                'billing_address',
                'created_at'
            ]);

        return view('pages.admin.customers.index', compact('customers'));
    }

    public function create(): Factory|View|Application
    {
        return view('pages.admin.customers.form');
    }

    public function store(CustomerStoreRequest $request): RedirectResponse
    {
        Customer::create($request->validated());

        return response()->redirectToRoute(RouteNameConstants::CUSTOMERS);
    }

    public function show(Customer $customer)
    {
        abort(404);
    }

    public function edit(Customer $customer): Factory|View|Application
    {
        return view('pages.admin.customers.edit', compact('customer'));
    }

    public function update(CustomerStoreRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());

        return response()->redirectToRoute(RouteNameConstants::CUSTOMERS);
    }

    public function destroy(Customer $customer)
    {
        abort(404);
    }
}
