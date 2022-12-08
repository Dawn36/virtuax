<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JeroenDesloovere\VCard\VCard;
use PKPass\PKPass;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId=Auth::user()->id;
        $user=User::where('id','!=',$userId)->where('user_type','2')->get();
        return view('admin/admin_index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin/admin_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_no' => ['required'],
            'password' => ['required'],
            'email' => ['required'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'parent_id'=>isset($request->parent_id) ? $request->parent_id : '0',
            'email'=>$request->email,
            'contact_no'=>$request->contact_no,
            'user_type'=>$request->role_id,
            'company_name'=>$request->company_name,
            'password_show'=>$request->password,
            'password'=> Hash::make($request->password),
            'created_at' => date("Y-m-d h:i:s"),
            'created_by' => Auth::user()->id,
        ]);
        $user->attachRole($request->role_id);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $company=User::where('user_type','3')->get();

        return view('admin/admin_edit',compact('user','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'contact_no' => ['required'],
            'email' => ['required'],
        ]);
        $user = User::find($id);
        if(Auth::user()->user_type == '2')
        {
            $user['parent_id'] = isset($request->parent_id) ? $request->parent_id : '0';
        }
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['contact_no'] = $request->contact_no;
        if($request->password != '')
        {
            $user['password'] = Hash::make($request->password);
            $user['password_show'] = $request->password;
        }
        
        $user['email'] = $request->email;
        $user['company_name'] = $request->company_name;
        $user['updated_by'] = Auth::user()->id;
        $user['updated_at'] = date("Y-m-d");
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TalkTrack  $talkTrack
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function userShow($id)
    {
        $users = User::find($id);
        $usersPhone= DB::select(DB::raw("SELECT * FROM user_phone_number where user_id='$id'"));
        $usersLink= DB::select(DB::raw("SELECT * FROM user_links where user_id='$id'"));
        $parentId=$users->parent_id;
        $company = User::where('id',$parentId)->get();

        return view('user/users_show',compact('users','company','usersPhone','usersLink'));
    }
    public function userIndex()
    {
        $userId=Auth::user()->id;
        if(Auth::user()->user_type == '2')
        {
            $users= DB::select(DB::raw("SELECT u.id,u.`first_name`,u.`last_name`,u.`email`,u.`contact_no`,c.`company_name`,u.`created_at`,COUNT(uv.`user_id`) AS user_views FROM `users` c LEFT JOIN `users` u ON c.`id`=u.`parent_id` left join `user_views` uv ON uv.`user_id`=u.`id` WHERE u.user_type='1' AND u.deleted_at IS NULL GROUP BY u.id"));
        }
        if(Auth::user()->user_type == '3')
        {
            $users= DB::select(DB::raw("SELECT u.id,u.`first_name`,u.`last_name`,u.`email`,u.`contact_no`,c.`company_name`,u.`created_at`,COUNT(uv.`user_id`) AS user_views FROM `users` c LEFT JOIN `users` u ON c.`id`=u.`parent_id` left join `user_views` uv ON uv.`user_id`=u.`id` WHERE u.user_type='1' AND u.parent_id='$userId' AND u.deleted_at IS NULL GROUP BY u.id"));
        }
        return view('user/users_index',compact('users'));
    }
    public function userCreate()
    {
        $company=User::where('user_type','3')->get();
        return view('user/users_create',compact('company'));
    }
    public function contactForm()
    {
        $id=Auth::user()->id;
        $users = User::find($id);
        $usersPhone= DB::select(DB::raw("SELECT * FROM user_phone_number where user_id='$id'"));
        $usersLink= DB::select(DB::raw("SELECT * FROM user_links where user_id='$id'"));
        $parentId=$users->parent_id;
        $company = User::where('id',$parentId)->get();

        return view('user/contact_form',compact('users','company','usersPhone','usersLink'));

    }
    public function virtualCard()
    {
        $id=Auth::user()->id;
        $users = User::find($id);
        $parentId=$users->parent_id;
        $company = User::where('id',$parentId)->get();
        return view('user/virtual_card',compact('users','company'));
    }
    public function userQr(Request $request)
    {
        $userId=$request->userId;
        return view('user/user_qr_code',compact('userId'));

    }
    public function userQrAdd($id)
    {
        $id=base64_decode($id);
        $userLink=explode('{{(----)}}',$id);
        $id=$userLink[0];
        $userDetails = User::find($id);
        $dateTime=Date('Y-m-d h:i:s');
        DB::insert('insert into user_views 
            (user_id,created_at) values(?,?)',
            [$id,$dateTime]);
            $hostwithHttp = request()->getSchemeAndHttpHost();
            $newPath=explode($hostwithHttp,$userDetails->v_card_path);
            $pathToVcard=public_path($newPath[1]);
            return response()->download($pathToVcard);
    }
    public function userContactForm(Request $request)
    {
        $userId=Auth::user()->id;
        $vcard = new VCard();
        $userData=user::find($request->user_id);
        $userData['first_name']=$request->first_name;
        $userData['last_name']=$request->last_name;
        $userData['contact_no']=$request->contact_no;
        $userData['email']=$request->email;
        $userData['street_address']=$request->street_address;
        $userData['city']=$request->city;
        $userData['zip_code']=$request->zip_code;
        $userData['country']=$request->country;
        $userData['town']=$request->town;
        $userData['function']=$request->function;
        if ($request->hasFile('file')) {
                $previousPic =  $userData['contact_form_path'];
                $previousPicDest = "contactformImg/" . $previousPic;
                File::delete($previousPicDest);
                $path = "contactformImg/" . $request->user_id;
                $file = $request->file('file');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path($path), $filename);
                $userData['contact_form_path'] = $path . "/" . $filename;
            }
        

        $dataPhone=[];
        DB::table('user_phone_number')->where('user_id',$request->user_id)->delete();
        for ($i=0; $i < count($request->phone_number); $i++) { 
            $userPhone=array('user_id'=> $request->user_id, 'phone_number'=>$request->phone_number[$i],'created_at'=>date('Y-m-d h:i:s'),'created_by'=>$userId);
            array_push($dataPhone,$userPhone);
        }
        DB::table('user_phone_number')->insert($dataPhone);

        $dataUrl=[];
        DB::table('user_links')->where('user_id',$request->user_id)->delete();
        for ($i=0; $i < count($request->type); $i++) { 
            $userPhone=array('user_id'=> $request->user_id, 'type'=>$request->type[$i], 'link'=>$request->link[$i],'created_at'=>date('Y-m-d h:i:s'),'created_by'=>$userId);
            array_push($dataUrl,$userPhone);
        }
        DB::table('user_links')->insert($dataUrl);


        $lastname = $userData['last_name'];
        $firstname = $userData['first_name'];
        $additional = '';
        $prefix = '';
        $suffix = '';
        $path=$userData->contact_form_path;

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
        // add work data
        $vcard->addCompany($request->company_name);
        $vcard->addJobtitle($request->function);
        // $vcard->addRole('Data Protection Officer');
        $vcard->addEmail($request->email);
        $vcard->addPhoneNumber($request->contact_no, 'PREF');

        for ($i=0; $i < count($request->phone_number); $i++) { 
            $vcard->addPhoneNumber($request->phone_number[$i], 'WORK');
        }
       

        $vcard->addAddress(null, null, $request->street_address, $request->town, null, $request->zip_code, $request->city);
        $vcard->addLabel("$request->street_address,$request->town,$request->zip_code,$request->city");

        for ($i=0; $i < count($request->link); $i++) { 
            $vcard->addURL($request->link[$i]);
        }
        
        if(!empty($path))
        {
            $path=asset($path);
            $vcard->addPhoto($path);
        }
        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        // return $vcard->download();

        // save vcard on disk
        $vcardPathDb=asset('vcard');
        $vcardPath=public_path().'/vcard';
        $vcard->setSavePath($vcardPath);
        $vcard->save();
        $userData['v_card_path']=$vcardPathDb.'/'.$vcard->filename.'.vcf';
        $userData->save();
        return redirect()->back();

    }
    public function userPkPass(Request $request)
    {
        $hexFontColor = $request->font_color;
        list($rFontColor, $gFontColor, $bFontColor) = sscanf($hexFontColor, "#%02x%02x%02x");
        $hexTitleColor = $request->title_color;
        list($rTitleColor, $gTitleColor, $bTitleColor) = sscanf($hexTitleColor, "#%02x%02x%02x");
        $hexBackgroundColor = $request->background_color;
        list($rBackgroundColor, $gBackgroundColor, $bBackgroundColor) = sscanf($hexBackgroundColor, "#%02x%02x%02x");
        
        $userId=Auth::user()->id;
        $userData=user::find($request->user_id);
        $userData['first_name']=$request->first_name;
        $userData['last_name']=$request->last_name;
        $userData['function']=$request->function;
        if ($request->hasFile('file')) {
                $previousPic =  $userData['ios_pass_path'];
                $previousPicDest = "iospasspath/" . $previousPic;
                File::delete($previousPicDest);
                $path = "iospasspath/" . $request->user_id;
                $file = $request->file('file');
                // $filename = date('YmdHi') . $file->getClientOriginalName();
                $filename = "thumbnail."."png";
                $file->move(public_path($path), $filename);
                $userData['ios_pass_path'] = $path . "/" . $filename;
            }
            $userData->save();
            $pathImg=$userData->ios_pass_path;
        // Replace the parameters below with the path to your .p12 certificate and the certificate password!
        $p12pass=asset('p2/Certificats.p12');
    $pass = new PKPass($p12pass, 'Ymacos59-');

// Pass content
$pass->setData('{

    "formatVersion" : 1,
    "passTypeIdentifier" : "pass.com.rework.vcard",
    "serialNumber" : "'.$request->user_id.'",
    "teamIdentifier" : "Y6J3KU8HYD",
    "barcode" : {
      "message" : "'.$userData->v_card_path.'",
      "format" : "PKBarcodeFormatQR",
      "messageEncoding" : "iso-8859-1"
    },
    "organizationName" : "'.$request->first_name.' '.$request->last_name.' - VirtuaCard",
    "description" : "",
    "logoText" : "",
    "foregroundColor" : "rgb(' . $rFontColor . ', ' . $gFontColor . ', ' . $bFontColor . ')",
    "backgroundColor" : "rgb(' . $rBackgroundColor . ', ' . $gBackgroundColor . ', ' . $bBackgroundColor . ')",
    "labelColor" : "rgb(' . $rTitleColor . ', ' . $gTitleColor . ', ' . $bTitleColor . ')",
    "generic" : {
      "primaryFields" : [
        {
          "key" : "member",
          "value" : "' . $request->first_name . ' ' . $request->last_name . '"
        }
      ],
      "secondaryFields" : [
        {
          "key" : "subtitle",
          "label" : "Compnay Name",
          "value" : "' . $request->company_name . '"
        }
      ],
  "auxiliaryFields" : [
        {
          "key" : "subtitle",
          "label" : "function",
          "value" : "' . $request->function . '"
        }
  ],
  
    }
  }');
// Add files to the pass package
$pass->addFile(asset('logos/pass/logo/icon.png'));
$pass->addFile(asset('logos/pass/logo/icon@2x.png'));
$pass->addFile($request->logo);
$pass->addFile($request->logo);
$pass->addFile($request->logo);
if(!empty($pathImg))
{
    $pathImg=asset($pathImg);
    $pass->addFile($pathImg);
}
$pass->addFile(asset('logos/pass/logo/thumbnail@2x.png'));

//thumbnail@2x.png
// $pass->addFile('D:\dawn\myproject\laravel\New QR\wetransfer_qr-code-project_2022-11-16_0519\virtuax279-laravel-project\virtuax\virtuax\www\icon@2x.png');
// $pass->addFile('D:\dawn\myproject\laravel\virtuax\public\contactformImg\17\icon.png');
// $pass->addFile('D:\dawn\myproject\laravel\virtuax\public\contactformImg\17\202211222029favicon.png');
// $pass->addFile('D:\dawn\myproject\laravel\virtuax\public\contactformImg\17\202211222029favicon.png');
// Create and output the pass
$pass->create(true);
    }
}
