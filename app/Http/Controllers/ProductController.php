<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     *@OA\Get(
    *path="/api/product",
    *summary="Liste des Produits",
    *@OA\Response(response="200",description="Liste des produits"),
    *@OA\Response(response="400",description="Erreur lors du listing"),
     * ),
     */
    public function index()
    {
        $produits=Product::all();
        $nbre=Product::count();
        return response()->json([
            'Nombre'=>$nbre,
            'Produit'=>$produits
        ]);
    }

    /**
     * @OA\Post(
     * path="/api/product",
     * summary="Create a product",
     * @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(
     *          required={"name","description","price"},
     *          @OA\Property(property="name",type="string"),
     *          @OA\Property(property="description",type="string"),
     *          @OA\Property(property="price",type="number",format="float"),
     * ),
     * ),
     * @OA\Response(response="200",description="Product add successfull"),
     * @OA\Response(response="401",description="Failed add product")
     * )
     */

    public function create(Request $request)
    {
        $validator=Validator::make($request->all(),[
        'name'=>'required|string',
        'desciption'=>'required|string',
        'price'=>'required|integer'
        ]);

        if($validator->fails())
        {
            return redirect('')->with('fail',$validator->errors());
        }
        $user=Product::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price')
        ]);
        return redirect('/')->with('success','Product add successfull');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * @OA\Put(
     * path="/api/user/{id}",
     * summary="Update user with id",
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="Update user with id",
     * @OA\Schema(type="integer"),
     * ),
     * @OA\Response(response="200",description="User update successfull"),
     * @OA\Response(response="401",description="Failed to update user"),
     * )
     */
    public function edit(Product $product)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     /**
      *@OA\Delete(
        *path="/api/user/{id}",
      *summary="Delete user with id",
      *  @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="Update user with id",
     * @OA\Schema(type="integer"),
     * ),
     * @OA\Response(response="200",description="User delete successfull"),
     * @OA\Response(response="401",description="Failed to delete user"),
      *),
      */
    public function destroy(Product $product,$id)
    {
      $affected=Product::where('id',$id)->delete();
      if($affected)
      {
        return redirect('/dashboard')->with('success','Suppression avec succes');
      }
      return back()->with('fail','Erreur lors de la suppression de l incident');
    }
}
