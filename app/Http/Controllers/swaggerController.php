<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class swaggerController extends Controller
{
    //


    ////////     swagger introduction    ////////////
    
    /**
     * @OA\Info(
     *    title="Laravel Example API",
     *    version="1.0.0",
     * )
    */
    
    /////////////////////////////////////////////////


    //////////////       admin api routes       ///////////////////

    /**
     * @OA\Get(
     * path="api/admin/getDataPur",
     * summary="get details of purchased products to admin",
     * description="get details with simple get request",
     * operationId="getDataPur",
     * tags={"admin"},
     * @OA\RequestBody(
     *    required=false,
     *    description="get details with simple get request",
     *    @OA\JsonContent(),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="[{'id':1,'user_name':'hello','user_contact':'7737805106','product_id':'4','created_at':'2021-04-20T17:53:27.000000Z','updated_at':'2021-04-20T17:53:27.000000Z'}]")
     *        )
     *     )
     * )
    */


    /** 
     * @OA\Post(
     * path="api/admin/create",
     * summary="Create Product",
     * description="create product with title, description, category and price",
     * operationId="create",
     * tags={"admin"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass item credentials",
     *    @OA\JsonContent(
     *       required={"title","description", "category", "price"},
     *       @OA\Property(property="title", type="string", format="text", example="test"),
     *       @OA\Property(property="description", type="string", format="text", example="test"),
     *       @OA\Property(property="category", type="string", format="text", example="test"),
     *       @OA\Property(property="price", type="integer", format="text", example="100"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Item has been created successfully.")
     *        )
     *     )
     * )
    */


    /** 
     * @OA\Post(
     * path="api/admin/update/{id}",
     * summary="Update Product Details",
     * description="Update the product details and if price changes then store in price history",
     * operationId="update",
     * tags={"admin"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass item credentials",
     *    @OA\JsonContent(
     *       required={"title","description", "category", "price"},
     *       @OA\Property(property="title", type="string", format="text", example="test"),
     *       @OA\Property(property="description", type="string", format="text", example="test"),
     *       @OA\Property(property="category", type="string", format="text", example="test"),
     *       @OA\Property(property="price", type="integer", format="text", example="100"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Items details have been updated successfully.")
     *        )
     *     )
     * )
    */



    /**
     * @OA\Get(
     * path="api/admin/getPriceHist/{year}",
     * summary="get price history in particular year to admin",
     * description="get details with simple get request along with year",
     * operationId="getPriceHist",
     * tags={"admin"},
     * @OA\RequestBody(
     *    required=false,
     *    description="get details with simple get request",
     *    @OA\JsonContent(),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="[{'id':1,'product_id':'1','new_price':'100','created_at':'2021-04-20T14:24:56.000000Z','updated_at':'2021-04-20T14:24:56.000000Z'}]")
     *        )
     *     )
     * )
    */


    /**
     * @OA\Get(
     * path="api/admin/getDataUnp",
     * summary="get details of unpurchased product to admin",
     * description="get details with simple get request",
     * operationId="getDataUnp",
     * tags={"admin"},
     * @OA\RequestBody(
     *    required=false,
     *    description="get details with simple get request",
     *    @OA\JsonContent(),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="[{'id':3,'title':'test3','description':'test3','category':'test3','price':'2000','created_at':'2021-04-20T17:20:35.000000Z','updated_at':'2021-04-20T17:20:35.000000Z'}]")
     *        )
     *     )
     * )
    */

    /////////////////////////////////////////////////////////////////////////////////


    ////////////////     user api routes     //////////////////////////////////


    /**
     * @OA\Get(
     * path="api/user/getDataUnp",
     * summary="Get product details for user",
     * description="get details with simple get request",
     * operationId="getDataUnp",
     * tags={"user"},
     * @OA\RequestBody(
     *    required=false,
     *    description="get details with simple get request",
     *    @OA\JsonContent(),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="[{'id':3,'title':'test3','description':'test3','category':'test3','price':'2000','created_at':'2021-04-20T17:20:35.000000Z','updated_at':'2021-04-20T17:20:35.000000Z'}]")
     *        )
     *     )
     * )
    */

     
    /** 
     * @OA\Post(
     * path="api/user/purchased",
     * summary="User purchase product ",
     * description="Purchase with product id, user's name and user's contact and remove that entry from products table",
     * operationId="purchase",
     * tags={"user"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials and product id",
     *    @OA\JsonContent(
     *       required={"contact","name", "product_id"},
     *       @OA\Property(property="user_contact", type="string", format="text", example="7737805106"),
     *       @OA\Property(property="user_name", type="string", format="text", example="Shrinit"),
     *       @OA\Property(property="product_id", type="integer", format="text", example="2"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="success",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Purchase has been made successfully.")
     *        )
     *     )
     * )
    */


    ////////////////////////////////////////////////////////////////////////////



}
