<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Data;

class HomeController extends Controller
{
    /**
     * 显示表格
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getIndex()
    {
        return view('datatables',['data'=>Data::all()]);
    }

    /**
     * 返回 ajax
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function getAjax()
    {
        return response()->json(['data' => Data::all()->toArray()]);
    }

    /**
     * ajax 数据提交
     */
    function postAjax(Request $request)
    {
        $data = [];
        $data['name'] = $request->input('name');
        $data['ipmi_area'] = $request->input('ipmi_area')?:'无';
        $data['ipmi_addr'] = $request->input('ipmi_addr')?:'无';
        $data['manage_area'] = $request->input('manage_area')?:'无';
        $data['manage_addr'] = $request->input('manage_addr')?:'无';
        $data['park_area'] = $request->input('park_addr')?:'无';
        $data['use'] = $request->input('use')?:'无';
        $data['model'] = $request->input('model')?:'无';

        Data::create($data);

    }

    /**
     * ajax 删除数据
     *
     * @param $id
     */
    function postDel(Request $request)
    {
        Data::find($request->input('id'))->delete();
    }
}
