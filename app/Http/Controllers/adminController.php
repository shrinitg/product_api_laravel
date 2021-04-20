<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use response;
use App\Models\products;
use Validator;

class adminController extends Controller
{
    //

    /////////  get all unpurchased data  /////////////
    public function getData()
    {
        $fetch_data = products::all();
        return response()->json($fetch_data);
    }
    ////////////////////////////////////////////////////


    //////////   create item in database   ///////////
    public function create(Request $request)
    {

        ///////   validate all fields with Validator  //////////
        $validated_data = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);
        /////////////////////////////////////////////////

        ///////  validator fails   ////////////////
        if( $validated_data->fails() ) {
            return response()->json($validated_data->errors());
        }
        ////////////////////////////////////////////
        
        ///////////   validator passes   //////////////
        else {

            //////////   create entry of item in database   ////////////
            $create_entry = products::create($request->all());
            //////////////////////////////////////////////

            /////////   error in creating entry   ///////////
            if( empty($create_entry) ) {
                return response()->json(['response' => 'Error Occured. Please try again']);
            }
            /////////////////////////////////////////

            /////////   entry created successully   //////////////
            else {
                return response()->json(['response' => 'Item has been created successfully']);
            }
            //////////////////////////////////////////
        }

    }
    //////////////////////////////////////////////////////

}
