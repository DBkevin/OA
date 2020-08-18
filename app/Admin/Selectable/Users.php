<?php

namespace App\Admin\Selectable;

use App\Models\User;
use Encore\Admin\Grid\Selectable;
use Encore\Admin\Grid\Filter;

class Users extends Selectable
{
    public $model = User::class;
    
    public function make(){
        $this->column("name",'咨询名字');
        $this->filter(function(Filter $filter){
            $filter->like("name","咨询名字");
        });
    }
}
