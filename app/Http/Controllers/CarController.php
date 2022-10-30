<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreReq;
use App\Http\Requests\CarUpdateReq;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\Response\Response;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Response $res, Request $request)
    {
        $perPage = $request->get('perPage', 25);
        return  $res->success(
            new CarCollection(Car::orderBy('id', 'DESC')->paginate($perPage)),
            'Cars fetched successfully.'
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarStoreReq $request, Response $res)
    {
        if ($car = Car::create($request->validated()))
            return $res->success(new CarResource($car), 'car created successfully.');
        else
            return $res->error('error while saving car');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car, Response $res)
    {
        return $res->success($car, 'Car fetched successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarUpdateReq $request, Response $res, Car $car)
    {   
        $car->model = $request->get('model', $car->model);
        $car->year = $request->get('year', $car->year);
        $car->color = $request->get('color', $car->color);
        if ($car->save())
            return $res->success($car, 'Car updated successfully.');
        return $res->error('error while updating Car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car, Response $res)
    {
        if ($car->delete())
            return $res->success($car, 'Car deleted successfully.');
        return $res->error('error while deleting Car');
    }
}
