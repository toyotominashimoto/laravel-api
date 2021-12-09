<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class NotebookController extends Controller
{
    public function show(){
        $contacts = DB::table('contacts')->get();
        return response()->json($contacts);
    }
    public function post(Request $request){
        $json = $request->json()->all();
        DB::table('contacts')->insert([
            'email' => $json[0]['email'],
            'name'=>$json[0]['name'],
            'company'=>$json[0]['company'],
            'phone'=>$json[0]['phone'],
            'datebirth'=>$json[0]['datebirth'],
            'photo'=>$json[0]['photo']
        ]);
        return response()->json(['acknowledged'=>true,'inserted id'=>$json[0]['id']]);
    }
    public function showId(Request $request,$id){
        $contact = DB::table('contacts')->where('id',$id)->first();
        return response()->json($contact);
    }
    public function postId(Request $request,$id){
        $json = $request->json()->all();
        DB::table('contacts')->where('id',$id)->update([
            'name'=>$json[0]['name'],
            'company'=>$json[0]['company'],
            'phone'=>$json[0]['phone'],
            'email'=>$json[0]['email'],
            'datebirth'=>$json[0]['datebirth'],
            'photo'=>$json[0]['photo']
        ]);
        return response()->json(['acknowledged'=>true,'updated post'=>$json[0]['id']]);
    }
    public function delete(Request $request){
        $json = $request->json()->all();
        DB::table('contacts')->where('id',$json[0]['id'])->delete();
        return response()->json(['acknowledged'=>true]);
    }
}
