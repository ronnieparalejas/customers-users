<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function create(Customer $customer)
    {
        ## we can use compact to pass data to view but I prefer array :)
        return view('admin.user.create', [
            'customer' => $customer
        ]);
    }

    public function store(Customer $customer, StoreUserRequest $request)
    {
        $customer->users()->create($request->all());

        session()->flash('success', trans('app.alert.added_sucessful', ['name' => $request->name]));

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', trans('app.alert.deleted_sucessful', ['name' => $user->name]));

        return back();
    }
}
