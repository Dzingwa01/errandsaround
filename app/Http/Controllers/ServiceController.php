<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Service;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('services.index');
    }

    public function getServices(){
       $services = Service::all();

        return Datatables::of($services)->addColumn('action', function ($service) {
            $re = '/update-service/' . $service->id;
            $sh = '/service/show/' . $service->id;
            $del =  $service->id;
            return '<a href=' . $re . ' title="Edit Service"><i class="material-icons">create</i></a><a id="' . $del . '" onclick="confirm_delete(this)" title="Delete Service" style="color:red"><i class="material-icons">delete_forever</i></a>';
        })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        //
        $input = $request->validated();
        DB::beginTransaction();
        try{
            $path = $request->file('service_image_url')->store('services');
            $service = Service::create(['price'=>$input['price'],'service_name'=>$input['service_name'],'service_description'=>$input['service_description'],'service_image_url'=>$path]);

            DB::commit();
            return redirect()->route('service.index')->withStatus(__('Service created successfully.'));
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('service.index')->withStatus(__('Service could not be created, please contact IT admin. '.$e->getMessage()));
//            return response()->json(['message'=>'An error occured while saving product, please contact IT admin'.],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $input = $request->all();
        DB::beginTransaction();

        try{
            if($request->has('service_image_url')){
                $path = $request->file('service_image_url')->store('services');
                $service->update(['service_image_url'=>$path,'service_name'=>$input['service_name'],'service_description'=>$input['service_description'],'price'=>$input['price']]);

            }else{
                $service->update(['service_name'=>$input['service_name'],'service_description'=>$input['service_description'],'price'=>$input['price']]);

            }
            DB::commit();
            return redirect()->route('service.index')->withStatus('Service updated successfully');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('service.index')->withStatus('Service could not be updated, contact your IT admin '.$e->getMessage());        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        return response()->json(['status'=>'success','message'=>'Service successfully deleted.'],200);
    }
}
