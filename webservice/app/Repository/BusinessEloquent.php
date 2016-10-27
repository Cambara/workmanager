<?php
/**
 * Created by PhpStorm.
 * User: cambabunto
 * Date: 26/10/16
 * Time: 21:06
 */

namespace App\Repository;

use App\Business;

class BusinessEloquent
{
    /**
     * @var Business
     */
    private $b;

    /**
     * BusinessEloquent constructor.
     * @param Business $b
     */
    public function __construct(Business $b)
    {
        $this->b = $b;
    }

    /**
     * @param Business $business
     * @return Business
     */
    public function save(Business $business)
    {
        $business->save();
        return $business;
    }

    /**
     * @param $id
     * @param $params
     * @return Business|bool|null
     */
    public function update($id, $params)
    {
        $business = $this->find($id);
        if(!$business)return false;
        $business->fill($params);
        $business->save();
        return $business;
    }

    /**
     * @param $id
     * @return bool|null
     */
    public function delete($id)
    {
        $business = $this->find($id);
        if(!$business)return false;
        return $business->delete();
    }

    /**
     * @param $id
     * @return Business|null
     */
    public function find($id)
    {
        return $this->b->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll()
    {
        return $this->b->all();
    }
}