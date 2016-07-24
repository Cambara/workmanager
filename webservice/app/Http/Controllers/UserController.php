<?php

namespace App\Http\Controllers;

use App\Repository\UserEloquent;
use App\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * @var UserEloquent
     */
    private $dao;
    public function __construct(UserEloquent $dao)
    {
        $this->dao = $dao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->dao->findAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $params = $request->all();
        $params['password'] = Hash::make($params['password']);
        $user = new User();
        $user->fill($params);
        $user->setRememberToken(Hash::make(date('Y-m-d H:i:s')));
        $user->type()->associate(UserType::find(1));
        $user->status()->associate(UserStatus::find(1));
        return $this->dao->save($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = $this->dao->find($id);
        if(!$user){
            return ["msg"=>"Usuário não existe"];
        }
        return new JsonResponse($user);
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
        $params = $request->all();
        if(isset($params['password']))
        {
            $params['password'] = Hash::make($params['password']);
        }
        return $this->dao->update($id,$params);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->dao->delete($id) ? ['msg' => 'Usuário removido!']: ['msg' => 'Usuário não encontrado!'];
    }
}
