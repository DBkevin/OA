<?php

namespace App\Admin\Selectable;

use App\Models\Doctor;
use Encore\Admin\Grid\Selectable;
use Encore\Admin\Grid\Filter;
use App\Models\Departmernt;

class Doctors extends Selectable
{
    public $model = Doctor::class;
    
    public function make(){
        $this->column('id','编号');
        $this->column("name",'医生名称');
        $this->column('Departmernt.name','所属科室名称');
        $this->filter(function(Filter $filter){
             $filter->like("name","医生名称");
        });
    }
}
