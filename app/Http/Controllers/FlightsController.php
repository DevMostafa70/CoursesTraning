<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Http\Requests\CreateFlightRequest;
use Illuminate\Support\Facades\DB;

class FlightsController extends Controller
{
    public function index()
    {
      //  $data=Flight::all();
      //  $data=Flight::first();
    //    $data=Flight::find(1);
    //     var_dump( $data);
        //die();
        // $data=Flight::paginate(2);
        //    $data=Flight::orderby('id','ASC')->get();
        // $data= DB::table('flights')->orderBy('id','DESC')->get();
       // $data = Flight::withTrashed()->active()->orderby('id', 'DESC')->get();
      // $data = Flight::withTrashed()->whereIn('id',[1,7,3])->orderby('id', 'DESC')->get();
     // $data = Flight::where('id','=',2)->orwhere('active','=',0)->orderby('id', 'DESC')->get();
         // $sum=Flight::where('active','=',1)->sum('active');
        // $counter=Flight::count();
        // return $counter;
         //  $data=Flight::all();
     $data = Flight::withTrashed()->with('destination')->with('booking')->orderby('id', 'DESC')->get();

    //   if(!empty($data)){
    //     foreach($data as $info){
    //        $thebooking=$info->booking;
    //        if(!empty($info->booking)){
    //         foreach($info->booking as $book){
    //               echo $book->traveler_name;
    //                echo $book->flight->name;
    //         }
    //        }
    //     }
    //   }

        return view('Flights', ['data' => $data]);
    }

    public function create()
    {
        return view('create_flights');
    }

    public function store(CreateFlightRequest $request)
    {
        /*
        $validated=$request->validate([
            'name'=>'required'
        ]);
*/

/*
        $dataToInsert = [
            'name' => $request->name,
            'created_at' => date('Y-m-d H:i:s')
        ];

        Flight::create($dataToInsert);
*/

        /*
    $dataToInsert['name']=$request->name;
    $dataToInsert['created_at']=$request->created_at;
    Flight::create($dataToInsert);
*/

        $flight= new Flight();
        $flight->name=$request->name;
         $flight->notes=$request->notes;
        // $flight->created_at=$request->created_at;
        $flight->save();

        return redirect()->route('flights');
    }

    public function edit($id)
    {
        $data = Flight::findOrFail($id);
        return view('edit_flights', ['data' => $data]);
    }

    public function update_flights(CreateFlightRequest $request, $id)
    {
        /* $flight=Flight::find($id);
        $flight->name=$request->name;
        $flight->save(); */

        $DataToUpdat['name'] = $request->name;
        Flight::where("id", "=", $id)->update($DataToUpdat);

        return redirect()->route('flights');
    }

    public function delete_flights($id)
    {
        /*
           $flight=Flight::find($id);
           $flight->delete();
*/
        Flight::where("id", "=", $id)->forceDelete();


        return redirect()->route('flights');
    }

    public function delete_soft($id)
    {
        Flight::where("id", "=", $id)->delete();
        return redirect()->route('flights');
    }

     public function restore($id)
    {
        Flight::where("id", "=", $id)->restore();
        return redirect()->route('flights');
    }


}
