<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 21.08.19
 * Time: 12:05
 */

namespace App\Http\Controllers;


use App\UserWordpress;

class UserController
{
    /**
     * Display a listing of the resource.
     *    * @SWG\Get(
     *      path="/users",
     *      summary="Returns users data",
     *      tags={"Users"},
     *      description="Returns users data.",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="success"
     *      )
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserWordpress::get();
    }



    /**
     * Display the specified resource.
     *   *     * @SWG\Get(
     *     *      path="/users/{id}",
     *      summary="Display the specified User",
     *      tags={"Users"},
     *      description="Get User",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of User",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserWordpress::find($id);
        if($user ){
            return $user;
        }else{
            return $this->sendError('Not Found', 404);
        }
    }
}