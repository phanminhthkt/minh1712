<?php

namespace App\Http\Controllers\Backend;

use App\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // File này có thực, bắt đầu đổi tên và move
        $fileExtension = $request->file('images')->getClientOriginalExtension(); // Lấy đuôi của file
        // Filename cực shock để khỏi bị trùng
        $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
        // Thư mục upload
        $uploadPath = public_path('../upload/product'); // Thư mục upload
        // Bắt đầu chuyển file vào thư mục
        $request->file('images')->move($uploadPath, $fileName);
        DB::table('table_product')->insert(
            [
                'images' =>$fileName,
                'name_vi' =>$request->name_vi,
                'code' =>$request->code,
                'quantity' =>$request->quantity,
                'description_vi' =>$request->description_vi,
                'content_vi' =>$request->content_vi,
                'title' =>$request->title,
                'keywords' =>$request->keywords,
                'description' =>$request->description,
                'price' =>$request->price,
            ]
        );
        return redirect()->route('Backend.Product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        $data = DB::table('table_product')->orderBy('id','desc')->get();
        return view('Backend.Product.index', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = DB::table('table_product')->where('id',$id)->first();
        return view('Backend.product.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = DB::table('table_product')->where('id',$id)->first();
        if(file_exists(public_path('../upload/product/'.$data->images))){
            File::delete(public_path('../upload/product/'.$data->images));
        }
        $fileExtension = $request->file('images')->getClientOriginalExtension(); // Lấy đuôi của file
        // Filename cực shock để khỏi bị trùng
        $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
        // Thư mục upload
        $uploadPath = public_path('../upload/product'); // Thư mục upload
        // Bắt đầu chuyển file vào thư mục
        $request->file('images')->move($uploadPath, $fileName);
        DB::table('table_product')->where("id",$id)->update(
            [
                'images' =>$fileName,
                'name_vi' =>$request->name_vi,
                'code' =>$request->code,
                'quantity' =>$request->quantity,
                'description_vi' =>$request->description_vi,
                'content_vi' =>$request->content_vi,
                'title' =>$request->title,
                'keywords' =>$request->keywords,
                'description' =>$request->description,
                'price' =>$request->price,
            ]
        );
        return redirect()->route('Backend.Product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
    public function delete($id){
        if($id){
            DB::table('table_product')->where('id',$id)->delete();
            return redirect()->route('Backend.Product.index');
        }else{
        }
        
    }
    public function delete_all(request $request){
        try{
            foreach($request->listid as $id){
                DB::table('table_product')->where('id',$id)->delete();
            }
            return redirect()->route('Backend.Product.index');
        }catch(Exception $e){

        }

    }

}
