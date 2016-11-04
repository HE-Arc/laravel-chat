<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @SWG\Get(
     *  path="/api/user",
     *  description="Returns all users.",
     *  operationId="index",
     *  produces={"application/json", "application/xml", "text/xml", "text/html"},
     *  @SWG\Parameter(
     *   name="name",
     *   in="query",
     *   description="name to filter by",
     *   required=false,
     *   type="array",
     *   @SWG\Items(type="string"),
     *   collectionFormat="csv"
     *  ),
     *  @SWG\Response(
     *   response=200,
     *   description="user response",
     *   @SWG\Schema(
     *    type="array",
     *    @SWG\Items(ref="#/definitions/User")
     *   ),
     *  ),
     *  @SWG\Response(
     *   response="default",
     *   description="unexpected error",
     *   @SWG\Schema(
     *    ref="#/definitions/ErrorModel"
     *   )
     *  )
     * )
     */
    public function index(Request $request) {
        return response()->json(User::all());
    }
    public function store(Request $request) {}
    public function create(Request $request) {}
    public function show(Request $request) {}
    public function update(Request $request) {}
    public function destroy(Request $request) {}
    public function edit(Request $request) {}
}
