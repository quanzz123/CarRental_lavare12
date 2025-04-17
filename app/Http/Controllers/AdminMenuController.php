<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblMenu;
class AdminMenuController extends Controller
{
    //
    public function index() {
        $menus = MenuTblMenuModel::orderBy('Position')->get();
        return view('admin.admin_menu',compact('menus'));
    }

    public function create() {
        return view('admin.create_menu');
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'Title' => 'required|string|max:255',
            'Alias' => 'required|string|max:255|unique:menus,Alias',
            'Position' => 'nullable|string|max:50',
            'IsActive' => 'nullable|boolean',
        ]);

        // Tạo menu mới
        $menu = new TblMenu();
        $menu->Title = $request->Title;
        $menu->Alias = $request->Alias;
        $menu->Description = $request->Description;
        $menu->Position = $request->Position; // hoặc mặc định
        $menu->Levels = $request->Levels; // hoặc mặc định
        $menu->Isactive = $request->Isactive ? 1 : 0;
        $menu->save();

        return redirect('/admin/menu')->back()->with('success', 'Thêm menu thành công!');
    }
}
