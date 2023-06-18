<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Scenario;
use Illuminate\Support\Facades\DB;

class ScenarioController extends Controller
{
    public function create()
    {
        $devices = DB::table('appdevices')->get();
        
        return view('scenario.addScenario', compact("devices"));
    }

    public function store(Request $request)
    {
        $scenario = new Scenario;
        $scenario->min = $request->input('min');
        $scenario->max = $request->input('max');
        $scenario->normal = $request->input('normal');
        $scenario->device_id = $request->input('device_id');
        $scenario->save();
        
        return redirect('list-scenarios')->with('message', "New scenario added successfully");
    }

    public function index()
    {
        $scenarios = Scenario::all();
        $image_dev = [];
        
        foreach ($scenarios as $scenario) {
            $image = DB::table('images_device')
                ->where('device_id', $scenario->device_id)
                ->select('image_path')
                ->first();

            $image_dev[$scenario->id] = $image ? $image->image_path : null;
        }
    
        return view('scenario.index', compact('scenarios', 'image_dev'));
    }

    public function edit($id)
    {
        $scenario=Scenario::findOrFail($id);
       
        return view('scenario.edit',compact("scenario"));
    }

    public function update(Request $request, $id)
    {
        $scenario= Scenario::findOrFail($id);
        $scenario->min= $request->input('min');
        $scenario->max= $request->input('max');
        $scenario->normal= $request->input('normal');
        $scenario->device_id= $request->input('device_id');
        $scenario->save();
                        
        return redirect('list-scenarios')->with('message',"site updated Successfully");
   
    }

    public function destroy($id){
        $scenario = Scenario::findOrFail($id);
        $scenario->delete();

        return redirect('list-scenarios')->with('message',"Scenario deleted successfully");
    }
}