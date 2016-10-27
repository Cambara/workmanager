<?php

namespace App\Http\Controllers;

use App\Business;
use App\Repository\BusinessEloquent;

use App\Http\Requests\BusinessRequest;

class BusinessController extends Controller
{
    /**
     * @var BusinessEloquent
     */
    protected $daoBusiness;

    /**
     * BusinessController constructor.
     * @param BusinessEloquent $businessEloquent
     */
    public function __construct(BusinessEloquent $businessEloquent)
    {
        $this->daoBusiness = $businessEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->daoBusiness->findAll();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = $this->daoBusiness->find($id);
        if(!$business)return ["msg" => "Empresa não existe"];
        return $business;
    }

    /**
     * @param BusinessRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessRequest $request)
    {
        $params = $request->all();
        $business = new Business();
        $business->fill($params);
        return $this->daoBusiness->save($business);
    }

    /**
     * @param BusinessRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessRequest $request, $id)
    {
        $params = $request->all();
        return $this->daoBusiness->update($id,$params);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->daoBusiness->delete($id) ? ['msg' => 'Empresa removida!']: ['msg' => 'Empresa não encontrada!'];
    }
}
