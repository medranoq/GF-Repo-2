<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birthdate' => $request->birthdate
        ]);

        return response()->json([
            'message' => 'Customer created',
            'data' => $customer
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $customer = Customer::find($id);

        if(!$customer){
            return response()->json([
                'message' => 'Customer not found.'
            ], 404);
        }
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $customer = Customer::findOrfail($id);

        $customer->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birthdate' => $request->birthdate
        ]);
        return response()->json([
            'message' => 'Customer updated successfully',
            'data:' => $customer
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $customer = Customer::findOrfail($id);

        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted successfully'
        ], Response::HTTP_OK);
    }
}
