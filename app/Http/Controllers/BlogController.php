<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;

class BlogController extends Controller
{
    public function viewIndex(){
      $users = DB::table('users')
      ->get();

      return view('index',['users'=>$users]);
    }


    public function submitInfo(Request $request){
      $validatedData=Validator::make($request->all(),
                    [
                        'name' => 'required|',
                        'email' => 'required|email|unique:users',
                        'skills' => 'required',
                        'image' => 'required|mimes:jpg,png,jpeg',
                        'gender' => 'required',
                        

                    ],

                    [
                      'name.required' => 'User name can not be blank.',
                        'email.email'=>'Enter a valid email address',
                        'skills.required' => 'Please check at least one skill.',
                        'image.mimes' => ' Please upload png or jpg image file',
                        'image.required'=>'please insert image',
                        'gender.required'=>'please select a gender',
                        'email.unique'=>'This Email used before'
                    ]);

                    $skill = json_encode($request->skills);
                    
                    $data=array();
                    $data['name']=$request->name;
                    $data['email']=$request->email;
                    $data['image']=$request->image;
                    $data['gender']=$request->gender;
                    $data['skills']=$skill;
                    $data['timestamp']=date('Y-m-d H:i:s');

                    if($validatedData->fails())
                    {
                        return Redirect::back()->withErrors($validatedData);
                    }

                    else
                    {

                          if ($request->hasFile('image'))
                            {
                              $filename =  $request->file('image')->getClientOriginalName();
                                        $request->file('image')->move(public_path('../public/user Image/'), $filename);
                                        $data['image']=$filename;

                                        $msg="User info inserted";
                                        DB::table('users')->insert($data);

                                        $users = DB::table('users')
                                        ->get();

                                        return view('index',['users'=>$users])->withError($msg);
                            }

                            else{
                              $msg="Please enter Image!";
                              return Redirect::back()->withErrors($msg);
                            }
                    }
                    


    }


    public function getEditUserInfo($uid){
      $u_id = base64_decode($uid);

        $user = DB::table('users')
                                ->where('uid',$u_id)
                                ->first();
                              //  return response()->json($data);
        return view('editInfo',['user'=>$user]);
    }


  public function postEditUserInfo(Request $request , $uid){
      $validatedData=Validator::make($request->all(),
      [
          'name' => 'required|',
          'email' => 'required|email',
          'image' => 'mimes:jpg,png',
          'gender' => 'required'
          

      ],

      [
          'name.required' => 'User name can not be blank.',
          'email.email'=>'Enter a valid email address',
          'image.mimes' => ' Please upload png or jpg image file',
          'gender.required'=>'please select a gender'
          
      ]);

      $skill = json_encode($request->skills);

      $user=DB::table('users')
                ->select('image')
                ->where('uid',$uid)
                ->first();
      
      $data=array();
      

      if ($request->hasFile('image') && $request->skills == null )
      {

        $path = public_path('../public/user Image/');
        $old_image=$path.$user->image;
        unlink($old_image);

        $filename =  $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('../public/user Image/'), $filename);

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['image']=$request->filename;
        $data['gender']=$request->gender;
        $data['skills']=$user->skills;
        $data['timestamp']=date('Y-m-d H:i:s');


          if($validatedData->fails())
                      {
                          return Redirect::back()->withErrors($validatedData);
                      }
          else
          {
            $msg="User updated";
            DB::table('users')->update($data)
            ->where('uid',$uid);

            $users = DB::table('users')
            ->get();

            return view('index',['users'=>$users])->withError($msg);
          }
        
        
      }

      elseif ($request->hasFile('image') && $request->skills != null )
      {

        $path = public_path('../public/user Image/');
        $old_image=$path.$user->image;
        unlink($old_image);

        $filename =  $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('../public/user Image/'), $filename);

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['image']=$request->filename;
        $data['gender']=$request->gender;
        $data['skills']=$skill;
        $data['timestamp']=date('Y-m-d H:i:s');

        if($validatedData->fails())
        {
            return Redirect::back()->withErrors($validatedData);
        }
        else
        {
        $msg="User updated";
        DB::table('users')
        ->where('uid',$uid)
        ->update($data);

        $users = DB::table('users')
        ->get();

        return view('index',['users'=>$users])->withError($msg);
        }
        
      }


      elseif($request->image == null && $request->skills != null)
      {
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['image']=$request->image;
        $data['gender']=$request->gender;
        $data['skills']=$skill;
        $data['timestamp']=date('Y-m-d H:i:s');

        if($validatedData->fails())
        {
            return Redirect::back()->withErrors($validatedData);
        }
        else
        {
        $msg="User updated";
        DB::table('users')
        ->where('uid',$uid)
        ->update($data);

        $users = DB::table('users')
        ->get();
        return view('index',['users'=>$users])->withError($msg);
        }

      }

      else
      {
        $user=DB::table('users')
                ->where('uid',$uid)
                ->first();
                
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['image']=$request->image;
        $data['gender']=$request->gender;
        $data['skills']=$user->skills;
        $data['timestamp']=date('Y-m-d H:i:s');

        if($validatedData->fails())
        {
            return Redirect::back()->withErrors($validatedData);
        }
        else
        {
        $msg="User updated";
         DB::table('users')
        ->update($data)
        ->where('uid',$uid);

        $users = DB::table('users')
        ->get();
        return view('index',['users'=>$users])->withError($msg);
        }

      }
          
  }


   public function deleteInfo($uid){
    $uid = base64_decode($uid);

    DB::table('users')
    ->where('uid',$uid)
    ->delete();

    $msg="User info deleted successfully";
    $users = DB::table('users')
    ->get();
    return view('index',['users'=>$users])->withError($msg);

   }
}
