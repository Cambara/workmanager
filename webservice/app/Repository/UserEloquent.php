<?php
namespace App\Repository;
use App\User;

class UserEloquent
{
    /**
     * @var User
     */
    private $u;
    public function __construct(User $u)
    {
        $this->u = $u;
    }

    /**
     * @param $user User
     * @return User
     */
    public function save(User $user)
    {
        $user->save();
        return $user;
    }

    /**
     * @param $id integer
     * @param $params array
     * @return User|bool|null
     */
    public function update($id,$params)
    {
        $user = $this->find($id);
        if(!$user)
        {
            return false;
        }
        $user->fill($params);
        $user->save();
        return $user;
    }
    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        $user = $this->find($id);
        if(!$user)
        {
            return false;
        }
        return $user->delete();
    }

    /**
     * @param $id integer
     * @return User|null
     */
    public function find($id)
    {
        return $this->u->with(["type","status"])->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll()
    {
        return $this->u->all();
    }

}