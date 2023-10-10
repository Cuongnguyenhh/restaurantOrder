<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoresModel as Stores;
use App\Http\Requests\StoresRequest;
use Illuminate\Validation\ValidationException;
class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

     try{
        $stores = Stores::paginate('5');
        return response()->json([
            'status' => 'success',
            'data' => $stores,
        ]);

     }catch(\Exception $e){
        return response()->json([
          'status' => 'error',
          'message' => $e->getMessage()
        ]);
     }
                         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate();
        try{
        $store = new Stores();
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->phone = $request->input('phone');
        $store->open_time = $request->input('open_time');
        $store->close_time = $request->input('close_time');
        $store->save();
        return response()->json([
          'status' =>'success',
          'data' => $store,
        ]);

        }
        // catch (ValidationException $e) {
        //     // Lấy danh sách lỗi validation từ $e->validator->getMessageBag()
        //     $errors = $e->validator->getMessageBag()->toArray();
    
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Validation failed',
        //         'errors' => $errors
        //     ], 422); // Trả về lỗi 422 Unprocessable Entity
        // } 
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $store = Stores::find($id);
            return response()->json([
              'status' =>'success',
                'data' => $store,
            ]);

        }catch(\Exception $e){
            return response()->json([
              'status' => 'error',
              'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Kiểm tra xem record có tồn tại hay không
            $store = Stores::find($id);
            if (!$store) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Record not found',
                ], 404); // Trả về mã lỗi 404 Not Found
            }
    
            // Cập nhật các trường dữ liệu
            $store->name = $request->input('name');
            $store->address = $request->input('address');
            $store->phone = $request->input('phone');
            $store->open_time = $request->input('open_time');
            $store->close_time = $request->input('close_time');
            $store->save();
    
            return response()->json([
                'status' => 'Update Successful',
                'data' => $store,
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage(),
            ], 500); // Trả về mã lỗi 500 Internal Server Error
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Stores::find($id);

        if ($store) {
            $store->delete();

            return response()->json([
                'status' =>'success',
                'message' => 'Xóa thành công'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Không tìm thấy cửa hàng cần xóa'
        ]);
    
    }
} 

