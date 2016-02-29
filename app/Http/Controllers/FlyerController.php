<?php

namespace App\Http\Controllers;

use App\flyer;
use App\photo;
use App\User;
use Illuminate\Http\Request;
use App\rashmi;
use App\Http\Requests\FormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class FlyerController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{

		$obj  = new rashmi();
		$data = $obj->all();
		return view('welcome', compact('data'));

	}

	public function view(rashmi $id)
	{
		$data = User::find($id->user_id);
		return view('view', compact('id', 'data'));
	}

	public function save_flyer(FormRequest $req)
	{
		flyer::create($req->all());
		$_SESSION['msg'] = "Success";
		$flyer           = new flyer();
		$data            = $flyer->all()->sortByDesc('created_at');
		return view('photos', compact('data'));
	}

	public function add_photo($id, Request $request)
	{
		$flyer = flyer::find($id);
		if ($flyer->user_id != Auth::id()) {
			if ($request->ajax()) {
				return response(['You are Unauthorized person'], 403);
			}
			return ('You Unauthorized user.');
		}
		/*$this->validate($request,[
			'addphoto' => 'required|mimes:jpg,jpeg,png,bmp'
		]);*/
		$file = $request->file('file');
		$name = time() . $file->getClientOriginalName();
		$file->move('flyers/photos', $name);

		$path = 'flyers/photos/' . $name;
		$th   = 'flyers/photos/th' . $name;
		Image::make($path)->fit(200)->save($th);
		$flyer->photo()->create(['path' => "{$name}"]);

	}

	public function show()
	{
		$flyer = new flyer();
		$data  = $flyer->all()->sortByDesc('created_at');
		return view('photos', compact('data'));
	}

	public function show_view($id)
	{
		$data = flyer::with('photo')->find($id);
		if ($data == NULL) {
			header('location:' . url('error'));
			exit;
		} else {
			return view('add_photo', compact('data'));
		}
	}
	public function destroy($id)
	{
		$flyer = flyer::find($id);
		if ($flyer->user_id != Auth::id()) {
			if ($request->ajax()) {
				return response(['You are Unauthorized person'], 403);
			}
			$_SESSION['msg'] = 'You Unauthorized user.';
		}
		$pic    = photo::find($id);
		$files1 = "flyers/photos/" . $pic->path;
		$files2 = "flyers/photos/th" . $pic->path;
		File::delete([
			$files1, $files2
		]);
		$pic->delete();
		return back();
	}


}
