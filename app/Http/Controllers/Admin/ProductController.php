<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Image;
use Intervention\Image\Exception\NotReadableException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.manageproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //this objectis just to fetch category in the product form
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the form input
        $request->validate([
            'product_name' => 'required|string|max:150',
            'product_desc' => 'required|string',
            'product_price' => 'required|string',
            'product_quantity' => 'required|string',
            'product_quality' => 'required|string',
            'product_category' => 'required|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'product_name.required' => 'Opps! Production name is required',
            'product_name.max' => 'Opps! Product name is too long',
            'product_desc.required' => 'Opps! Description is required',
            'product_price.required' => 'Opps! Price is required',
            'product_quantity.required' => 'Opps! Quantity is required',
            'product_quality.required' => 'Opps! Quality is required',
            'product_category.required' => 'Opps! Category is required',
            'product_image.required' => 'Opps! Image is required',
            'product_image.max' => 'Opps! Image File too large',
            'product_image.mimes' => 'Opps! Image type Not Supported',
        ]);

        $product = new Product;
        
        // assign input values to the object
        $product->name = $request->product_name;
        $product->description = $request->product_desc;
        $product->quality = $request->product_quality;
        $product->quantity = $request->product_quantity;
        $product->price = $request->product_price;
        $product->category_id = $request->product_category;

        if ($files = $request->file('product_image')) {
     
            // for save original image
            $ImageUpload = Image::make($files);
            $originalPath = public_path().'/images/products/';
            $ImageUpload->save($originalPath.$files->getClientOriginalName());
             
            // for save thumnail image
            $thumbnailPath = public_path().'/thumbnail/';
            $ImageUpload->resize(250,125);
            $ImageUpload = $ImageUpload->save($thumbnailPath.$files->getClientOriginalName());
         
            $product->photo  = $files->getClientOriginalName();
          
        }
        
        // inserting the object into the DB
        $product->save();
        
        return redirect('/manage-product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //this objectis just to fetch category in the product form
        $categories = Category::all();
        //fetch the specific product
        $products = Product::findOrFail($id);
        return view('admin.editproduct', compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the form input
        $request->validate([
            'product_name' => 'required|string|max:150',
            'product_desc' => 'required|string',
            'product_price' => 'required|string',
            'product_quantity' => 'required|string',
            'product_quality' => 'required|string',
            'product_category' => 'required|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'product_name.required' => 'Opps! Production name is required',
            'product_name.max' => 'Opps! Product name is too long',
            'product_desc.required' => 'Opps! Description is required',
            'product_price.required' => 'Opps! Price is required',
            'product_quantity.required' => 'Opps! Quantity is required',
            'product_quality.required' => 'Opps! Quality is required',
            'product_category.required' => 'Opps! Category is required',
            'product_image.required' => 'Opps! Image is required',

            'product_image.mimes' => 'Opps! Image type Not Supported',
            'product_image.max' => 'Opps! Image file too large',
        ]);

        //$product = new Product;
        $product = Product::find($id);
        
        // assign input values to the object
        $product->name = $request->product_name;
        $product->description = $request->product_desc;
        $product->quality = $request->product_quality;
        $product->quantity = $request->product_quantity;
        $product->price = $request->product_price;
        $product->category_id = $request->product_category;
        
        if ($product->photo) {
            if($file = $request->hasFile('product_image')) {
            
                $file = $request->file('product_image') ;
                
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path().'/images/products/';
                $fileName = str_replace(' ', '_', $fileName);
                $file->move($destinationPath,$fileName);
                $product->photo = $fileName ;
            }
        }


        $product->save();
        return redirect('/manage-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
