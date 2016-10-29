<?php

namespace App\Http\Controllers;

use App\WorkTable;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repository\WorkTableRepository;
use App\Http\Requests\WorkTableRequest;

class WorkTableController extends Controller
{
    /**
     * @var WorkTableRepository
     */
    private $dao;

    /**
     * WorkTableController constructor.
     * @param WorkTableRepository $dao
     */
    public function __construct(WorkTableRepository $dao)
    {
        $this->dao = $dao;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->dao->findAll();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workTable = $this->dao->find($id);
        if(!$workTable) return ["msg" => "Planilha de trabalho não encontrada"];
        return $workTable;
    }

    /**
     * @param WorkTableRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkTableRequest $request)
    {
        $workTable = new WorkTable();
        $params = $request->all();
        $workTable->fill($params);
        return $this->dao->save($workTable);
    }

    /**
     * @param WorkTableRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkTableRequest $request, $id)
    {
        $params = $request->all();
        return $this->dao->update($id,$params);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->dao->delete($id) ? ['msg' => 'Planilha de trabalho deletada'] :['Planilha de trabalho não encontrada'];
    }
}
