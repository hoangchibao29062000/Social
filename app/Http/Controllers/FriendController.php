<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // Phương thức xử lý gởi lời kết bạn
    public function madeFriend()
    {
        Friends::create([
            'role' => '0',
            'user_id_send' => $_GET['send'],
            'user_id_get' => $_GET['get']
        ]);
        return redirect('/myFriend');
    }
    // Xóa lời mời kết bạn
    public function deleteInviteFriend() {
        friends::where([
            'id'=>$_GET['id'],
        ])->delete();
        return redirect('/myFriend');
    }
    // Xử lý đồng ý kết Bạn
    public function submitFriend() {
        friends::where([
            'id'=>$_GET['id'],
        ])->update([
            'role'=>2
        ]);
        return redirect('/myInfo');
    }
}
