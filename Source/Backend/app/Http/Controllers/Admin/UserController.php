<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Upload;
use App\Http\Requests\Admin\UsersRequest;
use App\Http\Requests\Admin\EditUserRequest;
use Hash;
class UserController extends Controller
{
    use Upload;

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
        return view('admin_page.users.add');
    }


    public function store(UsersRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['function'] = config('setting.function.full');
        $status = User::create($input);
        if($status){
            return redirect()->route('users.create')->with('messageSuccess', trans('messages.user.add.success'));
        } else {

            return redirect()->route('users.create')->with('messageFail', trans('messages.user.add.fail'));
        }
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
        $oldModUser = User::where('id', $id)->get();
        foreach($oldModUser as $key => $value){
            $add = substr($value->function,config('setting.function.add'),config('setting.function.cut'));
            $edit = substr($value->function,config('setting.function.edit'),config('setting.function.cut'));
            $del = substr($value->function,config('setting.function.del'),config('setting.function.cut'));
        }
        return view ('admin_page.users.edit', compact('oldModUser','add','edit','del'));
    }

    public function update(EditUserRequest $request, $id)
    {
        $checkpass =  User::where('id', $id)->first()->password;
        $input = $request->all();
        if($input['password'] === $checkpass){
            $input['password'] = $input['password'];
        }else{
            $input['password'] = Hash::make($input['password']);
        }
        if(isset($input['edit'])){
            $edit = config('setting.function.allow');
        }else{
            $edit = config('setting.function.denie');
        }
        if(isset($input['add'])){
            $add = config('setting.function.allow');
        }else{
            $add = config('setting.function.denie');
        }
        if(isset($input['del'])){
            $del = config('setting.function.allow');
        }else{
            $del = config('setting.function.denie');
        }
        $function = $add . $edit . $del;
        $input['function'] = $function;
        unset($input['_method'],$input['add'],$input['edit'],$input['del'],$input['_token'],$input['repass']);
        if($input['password'] == null) {
            unset($input['password']);
        }
        if(isset($input['image'])){
            $input['image'] = $this->saveImg($input['image'],'public/images/avatars/');
        }
        $status = User::where('id', $id)->update($input);
        if($status){

            return redirect()->route('ModManager')->with('messageSuccess', trans('messages.user.edit.success'));
        } else {

            return redirect()->route('ModManager')->with('messageFail', trans('messages.user.edit.fail'));
        }
    }

    public function destroy($id)
    {   
        $typeUser = User::where('id',$id)->first()->id_role;
        
        $Del = User::where('id',$id)->delete();
        
        if($Del){
            if($typeUser == config('setting.role.mod')){
                return redirect()->route('ModManager')->with('messageSuccess', trans('messages.user.del.success'));
            }
            else {
                return redirect()->route('ViewerManager')->with('messageSuccess', trans('messages.user.del.success'));
            }
        } else {
            if($typeUser == config('setting.role.mod')){
                return redirect()->route('ModManager')->with('messageFail', trans('messages.user.del.fail'));
            }
            else {
                return redirect()->route('ViewerManager')->with('messageFail', trans('messages.user.del.fail'));
            }
        }
    }
}
