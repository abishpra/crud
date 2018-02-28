<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;
use function Sodium\compare;
use Image;
class UserController extends Controller
{

    public function index()
    {
        $search=\Request::get('search');
        $users=User::where('name','like','%'.$search."%")->orderBy('id')->paginate(5);
        return view(' user.index',compact('users'));
    }

     public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'Required',
            'address'=>'Required',
            'gender'=> 'Required',
            'image'=>'required|mimes:jpeg,jpg,gif,png,bmp|max:5000'
        ]);
        $edu=$request['education'];
        if (empty($edu)){
            $arrr=null;
        }else {
            $arrr = serialize($edu);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uploadPath = public_path('userImage/');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random() . '.' . $ext;
            $make = Image::make($image);
            $save = $make->resize(500, null, function ($ar) {
                $ar->aspectRatio();
            })->save($uploadPath . $imageName);
            if ($save) {
                $imageSave = $imageName;
            }
        }
        DB::table('users')->insert([
            'name'=>$request['name'],
            'address'=>$request['address'],
            'gender'=>$request['gender'],
            'education'=>$arrr,
            'image'=>$imageSave
        ]);
        return redirect('user');
    }

    public function show($id)
    {
        $user=User::find($id);
        $data=$user->education;
        $user['education']=unserialize($data);
        return view('user.show',compact('user'));
    }
    public function edit($id)
    {
        $user=User::find($id);
        $data=$user->education;
        $user['education']=unserialize($data);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'Required',
            'address' => 'Required',
            'gender' => 'Required',
        ]);
        $user = User::find($id);
        $userUpdate = $request->all();
        $edu=$request->education;
        if (!empty($edu)){
            $ser_edu = serialize($edu);
        }else{
            $ser_edu=$edu;
        }
        $oldImage = $user->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $uploadPath = public_path('userImage/');
            $ext = $image->getClientOriginalExtension();
            $imageName = str_random() . '.' . $ext;
            $make = Image::make($image);
            $save = $make->resize(500, null, function ($ar) {
                $ar->aspectRatio();
            })->save($uploadPath . $imageName);
            if ($save) {
                $userUpdate['image'] = $imageName;
            }
            Storage::delete($oldImage);
        }else{
            $userUpdate['image']=$oldImage;
        }
        DB::table('users')->where('id', $id)->update([
            'name' => $userUpdate['name'],
            'address' => $userUpdate['address'],
            'gender' => $userUpdate['gender'],
            'education' => $ser_edu,
            'image' => $userUpdate['image']
        ]);
        return redirect('user');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        Storage::delete($user->image);
        $user->delete();
        return redirect('user');
    }

    public function image($id){
        $user=User::find($id);
        Storage::delete($user->image);
        return redirect('user');

    }
}
