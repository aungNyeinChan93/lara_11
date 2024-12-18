<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $customers = Customer::query()->orderBy('id', 'desc')->simplePaginate(2);

        return view('customers.list',compact('customers'));
    }

    /**
     * Summary of show
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Customer $customer){
        return view('customers.detail',compact('customer'));
    }
}
