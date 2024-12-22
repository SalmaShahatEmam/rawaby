<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CeckController extends Controller
{
    public function email(Request $request)
    {
       
        return $this->checkRecordExists('User', 'email', $request->email, $request, __('هذا البريد الالكتروني مستخدم بالفعل'));
    }

    public function phone(Request $request)
    {
        return $this->checkRecordExists('User', 'phone', $request->phone, $request, __('هذا الهاتف مستخدم بالفعل'));
    }

    public function password(Request $request)
    {
        if (Hash::check($request->old_password, auth()->user()->password)) {
            return true;
        } else {
            return response()->json(['message' => __('كلمة المرور القديمة غير صحيحة')]);
        }
    }

    // public function money(Request $request)
    // {
    //     return $this->checkRecordExists('Payment', 'name', $request->name, $request, __('هذا الاسم مستخدم بالفعل'));

    // }


    private function checkRecordExists($model, $field, $value, $request, $message)
    {
        $query = 'App\Models\\' . $model;
        $query = new $query;

        if ($request->id) {
            if ($query->where($field, $value)->where('id', '!=', $request->id)->exists()) {
                return response()->json(['message' => transWord($message)]);
            }
        } else {
            if ($query->where($field, $value)->exists()) {
                return response()->json(['message' => transWord($message)]);
            }
        }

        return response()->json(true);
    }
}
