<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;


class CommentsController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$index=new Comment;
    	$index=$index::orderBy('created_at','desc')->paginate(10);
    	return view('/main',compact('index'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'last_name'=>'required',
    		'city'=>'required',
    		'address'=>'required',
    		'state'=>'required'
    	]);
    	$store=new Comment();
    	$store->name=request('name');
    	$store->last_name=request('last_name');
    	$store->address=request('address');
    	$store->city=request('city');
    	$store->state=request('state');
    	$store->author=Auth::id();
    	$store->save();
    	return redirect('/main');
    }

    public function view($id){
    	$data=Comment::find($id);
    	return view('view',compact('data'));
    }

    public function delete($id){
    	$delet = Comment::find($id)->delete();
    	return redirect('/main');
    }
}
