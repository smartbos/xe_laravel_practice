<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Todo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
//user Request;
use DB;

class TodoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store(Request $request)
	{
        $title = $request->input('title');
//        DB::insert('insert into todos (title) VALUES (?)', [$title]);
//        DB::table('todos')->insert(['title' => $title]);
//        $todo = new Todo();
//        $todo->title = $title;
//        $todo->save();

        Todo::create([
            'title' => $title
        ]);

        return redirect('/');
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
		$todo = Todo::find($id);
        $todo->delete();

        return redirect('/');
	}

    public function done($id)
    {
        $todo = Todo::find($id);

        if($todo->done == 1){
            $todo->done = 0;
        } else {
            $todo->done = 1;
        }

        $todo->save();

        return redirect('/');
    }
}
