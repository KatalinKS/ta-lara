<?php


namespace App\Models;


class TestModel extends \Illuminate\Database\Eloquent\Model
{
    public function index()
    {
        TestModel::where('active', 1)->first();
    }
}
