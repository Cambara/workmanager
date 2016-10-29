<?php

namespace App\Repository;
use App\WorkTable;

class WorkTableRepository
{
    /**
     * @var WorkTable
     */
    private $w;

    /**
     * WorkTableRepository constructor.
     * @param WorkTable $w
     */
    public function __construct(WorkTable $w)
    {
        $this->w = $w;
    }

    /**
     * @param WorkTable $workTable
     * @return WorkTable
     */
    public function save(WorkTable $workTable)
    {
        $workTable->save();
        return $workTable;
    }

    /**
     * @param $id
     * @param $params
     * @return WorkTable|bool|null
     */
    public function update($id,$params)
    {
        $workTable = $this->find($id);
        if(!$workTable) return FALSE;
        $workTable->fill($params);
        $workTable->save();
        return $workTable;
    }

    /**
     * @param $id
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $workTable = $this->find($id);
        if(!$workTable) return FALSE;
        return $workTable->delete();
    }

    /**
     * @param $id
     * @return WorkTable|null
     */
    public function find($id)
    {
        return $this->w->with(['business'])->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll()
    {
        return$this->w->with(['business'])->get();
    }
}