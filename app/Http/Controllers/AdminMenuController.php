<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblMenu;
class AdminMenuController extends Controller
{
    //
    public function index() {
        $menus = TblMenu::orderBy('Position')->get();
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
            'Alias' => 'required|string|max:255|unique:tbl_menus,Alias',
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

        return redirect('/admin/menu')->with('success', 'Thêm menu thành công!');
    }
    public function Edit($id) {
        $menu = TblMenu::findorFail($id);
        return view('admin.edit_menu', compact('menu'));
    }
    public function update(Request $request, $id) {
        $menu = TblMenu::findorFail($id);

        $request->validate([
        'Title' => 'required|string|max:255',
        'Alias' => 'required|string|max:255|unique:tbl_menus,Alias,' . $menu->id,
        'Position' => 'nullable|string|max:50',
        'Isactive' => 'nullable|boolean',
        ]);

        $menu->Title = $request->Title;
        $menu->Alias = $request->Alias;
        $menu->Description = $request->input('Description','');
        $menu->Position = $request->input('Position','');
        $menu->Levels = $request->input('Levels',0);
        $menu->Isactive = $request->has('Isactive')?1:0;
        $menu->save();

        return redirect('admin/menu')->with('success','cap nhat thanh cong');

    }
}
