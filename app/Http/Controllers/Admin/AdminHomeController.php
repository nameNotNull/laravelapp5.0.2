<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Page;
use DB;
use Crypt;
use Mail;
class AdminHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$pathToFile = '/aa.txt';
		$results = DB::select('select * from users where id = ?', [1]);
		DB::connection()->enableQueryLog();
		$queries = DB::getQueryLog();
		$encrypted = Crypt::encrypt('secret');
		var_dump($encrypted);
		$decrypted = Crypt::decrypt($encrypted);
		var_dump($decrypted);
	//	$data = "test";
		$data = ['email'=>'wangxuan6@staff.sina.com.cn', 'name'=>'fasong', 'uid'=>'123', 'activationcode'=>'unknown'];

		Mail::send('emails.activemail', $data, function($message) use($data)
		{
    		$message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
		});
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
