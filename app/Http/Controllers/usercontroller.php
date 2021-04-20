<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\products;
use Validator;

class usercontroller extends Controller
{
    //

    ///////   user purchase item   /////////////
    public function purchase(Request $request)
    {

        ///////   validate all fields with Validator  //////////
        $validated_data = Validator::make($request->all(), [
            'product_id' => 'required',
            'user_name' => 'required',
            'user_contact' => 'required|digits:10|regex:/^[6789]\d{9}$/',
        ]);
        /////////////////////////////////////////////////

        ///////  validator fails   ////////////////
        if( $validated_data->fails() ) {
            return response()->json($validated_data->errors());
        }
        ////////////////////////////////////////////
        
        ///////////   validator passes   //////////////
        else {

            /////////   search for product   ///////////////
            $search_product_id = products::where('id', $request->product_id)->get();
            ////////////////////////////////////////////////

            /////////   product does not exist   ///////////
            if( empty($search_product_id[0]) ) {
                return response()->json(['response' => 'Product does not exist in the list.']);
            }
            /////////////////////////////////////////////////

            //////////   delete entry from products table     ////////////////
            $delete_entry = products::where('id', $request->product_id)->delete();
            //////////////////////////////////////////////////////////////////

            //////////    deletion of entry failed    ////////////////
            if(!$delete_entry) {
                return response()->json(['response' => 'Error Occured. Please try again']);
            }
            //////////////////////////////////////////////////////////

            //////////   create entry of purchase in database   ////////////
            $create_entry = purchase::create($request->all());
            //////////////////////////////////////////////

            /////////   error in creating entry   ///////////
            if( empty($create_entry) ) {
                return response()->json(['response' => 'Error Occured. Please try again']);
            }
            /////////////////////////////////////////

            /////////   entry created successully   //////////////
            else {
                return response()->json(['response' => 'Purchase has been made successfully']);
            }
            //////////////////////////////////////////
        }

    }
    /////////////////////////////////////////////////////////////////////////////////////////


    /////////  get all unpurchased data  /////////////
    public function getDataUnp()
    {
        $fetch_data = products::all();
        return response()->json($fetch_data);
    }
    ////////////////////////////////////////////////////

}
