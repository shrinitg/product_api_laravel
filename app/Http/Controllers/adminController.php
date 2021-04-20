<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use response;
use App\Models\products;
use App\Models\PriceHistory;
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


    //////////   update items in database   //////////
    public function update(Request $request, $id)
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

            //////////   fetch previous price of 'id'  //////////////
            $prev_price = products::select('price')->where('id', $id)->get();
            /////////////////////////////////////////////////////////

            /////////    new and previous price are different   //////////
            if( $prev_price[0]['price'] != $request->price ) {

                //////////    create entry in database      /////////
                $price_hist_entry = PriceHistory::create([
                    'product_id' => $id,
                    'new_price' => $request->price
                ]);
                /////////////////////////////////////////////////////

                if( empty($price_hist_entry) ) {
                    return response()->json(['response' => 'Error Occured. Please try again']);
                }

            }
            ////////////////////////////////////////////////////////

            //////////   update entry of item in database   ////////////
            $update_entry = products::where('id', $id)
                ->update([
                'title' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'price' => $request->price
            ]);
            //////////////////////////////////////////////

            /////////   error in updating entry   ///////////
            if( empty($update_entry) ) {
                return response()->json(['response' => 'Error Occured. Please try again']);
            }
            /////////////////////////////////////////

            /////////   entry updated successully   //////////////
            else {
                return response()->json(['response' => 'Items details has been updated successfully']);
            }
            //////////////////////////////////////////

        }

    }
    ///////////////////////////////////////////////////

}
