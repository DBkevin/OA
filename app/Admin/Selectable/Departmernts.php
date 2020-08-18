<?php

namespace App\Admin\Selectable;

use App\Models\Departmernt;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Departmernts extends Selectable{
    public $model=Departmernt::class;

    public function make(){
        $this->column('id',"编号");
        $this->column('name',"科室名称");

        $this->filter(function(Filter $filter){
            $filter->like("name","科室名称");
        }); //简单搜索框
    }
}