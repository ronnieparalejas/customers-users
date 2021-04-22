<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('name')->get();
        
        return view('admin.customer.index', [
            'rows' => $customers
        ]);
    }


    public function show(Customer $customer)
    {
        $users = $customer->users()->paginate(5);

        return view('admin.customer.show', [
            'customer' => $customer,
            'users' => $users
        ]);
    }
}
