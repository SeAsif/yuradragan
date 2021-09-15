<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Todo;
use App\User;
use Illuminate\Http\Request;
use App\Mail\SendEmail;
use App\Http\Requests\StoreTodosRequest;


class TodoController extends Controller
{
    
    protected $userID;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->userID = Auth::user()->id;
            return $next($request);
        });

    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $User = User::find($this->userID);
        $data =  $User->todos()->paginate(3);
       
        return view('todos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodosRequest $request)
    {
        //
        $data = $request->except('_token');
        $data["user_id"] = $this->userID;
        //
        Todo::create($data);
        //
        
        $information=["title"=>"todo created",
        "message"=>$data["title"],
        "username"=>auth::user()->name
        ];

        \Mail::to(auth::user()->email)->send(new SendEmail($information));

        return back()->with('success', 'Todo created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $todo_id = decrypt($id);
        $User = User::find($this->userID);
        $data = $User->todos()->find($todo_id);
        return view('todos.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $todo_id = decrypt($id);
        $User = User::find($this->userID);
        $data =  $User->todos()->find($todo_id);
        return view('todos.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTodosRequest $request)
    {
        //
        $data = $request->except('_token');
        //
        $todo=Todo::findorfail($data["id"]);
        $todo->update($data);
        //
        $information = ["title" => "todo updated",
            "message" => $data["title"],
            "username" => auth::user()->name
        ];

        \Mail::to(auth::user()->email)->send(new SendEmail($information));
        
        return back()->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todo_id = decrypt($id);
        //
        $todo = Todo::findorfail($todo_id);
        //
        $todo->delete();

        return back()->with('success', 'Todo deleted successfully');

    }
}
