<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerInfoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CustomerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $customer = Customer::paginate();

        return view('customer-info.index', compact('customer'))
            ->with('i', ($request->input('page', 1) - 1) * $customer->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $customerInfo = new Customer();

        return view('customer-info.create', compact('customerInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerInfoRequest $request): RedirectResponse
    {
        Customer::create($request->validated());

        return Redirect::route('customer-infos.index')
            ->with('success', 'CustomerInfo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $customerInfo = Customer::find($id);

        return view('customer-info.show', compact('customerInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $customerInfo = Customer::find($id);

        return view('customer-info.edit', compact('customerInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerInfoRequest $request, Customer $customerInfo): RedirectResponse
    {
        $customerInfo->update($request->validated());

        return Redirect::route('customer-infos.index')
            ->with('success', 'CustomerInfo updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Customer::find($id)->delete();

        return Redirect::route('customer-infos.index')
            ->with('success', 'CustomerInfo deleted successfully');
    }
}
