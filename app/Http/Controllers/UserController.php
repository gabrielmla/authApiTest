<?php

namespace authApi\Http\Controllers;

use Illuminate\Http\Request;

use authApi\Http\Requests;
use authApi\Http\Controllers\Controller;

use authApi\User;

class UserController extends Controller
{

    public function authenticate(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->where('password', $password)->first();

        if ($user) {
            return response()->json($user);
        } else {
            if ($this->verifyEmail($email)) {
                return response('E-mail não encontrado.');
            } else {
                return response('Senha incorreta.');
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->verifyEmail($request->email)) {
            return response('E-mail em uso.');
        } else {
            $user = new User;
            $user->fill($request->all());
            $saved = $user->save();

            if (!$saved) {
                return response('Falha no registro.');
            }

            return response('Registrado com sucesso.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function verifyEmail($email) {
        return is_null(User::where('email', $email)->first());
    }
}
