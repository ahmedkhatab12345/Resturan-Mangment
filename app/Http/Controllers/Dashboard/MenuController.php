<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Item;
use App\Http\Requests\MenuRequest;

class MenuController extends Controller
{
    
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.menus.index',compact('menus'));
    }

    public function create()
    {
        return view('dashboard.menus.create');
    }

    public function store(MenuRequest $request)
    {
        try {
            //fetch data
            $menus = $request->all();
            //store data
            $menus = Menu::create([              
                'name'=> $menus['name'],
                'description'=> $menus['description'],
            ]);
            return redirect()->route('menus.index')->with('success', 'Menu added successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error adding Menu: ' . $e->getMessage())->withInput();
            }
    }

    
    public function show($id)
    {
        $items = Item::find($id)->items;
        $menus = Menu::find($id);
        return view('Dashboard.menus.showItem',compact('items','menus'));
    }

    public function edit($id)
    {
        $menus = Menu::find($id);
        if (!$menus) {
            return redirect()->route('menus.index')->with(['error' => 'This Menu Is Not Found']);
        }

        return view('dashboard.menus.edit', compact('menus'));
    }

    public function update(MenuRequest $request,$id)
    {
        try {
            $menus = Menu::find($id);
        
            if (!$menus) {
                return redirect()->route('menus.index')->with('error', 'Menu not found');
            }

            // Update other data
            $menus->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        
            return redirect()->route('menus.index')->with('success', 'Menu updated successfully');
        } catch (\Exception $e) {

            return redirect()->route('menus.index')->with('error', 'Error updating Menu: ' . $e->getMessage())->withInput();
        }
    }

   
    public function destroy($id)
    {
        $menus = Menu::destroy($id);

        if ($menus) {
            return redirect()->route('menus.index')->with('success', 'Menu deleted successfully');
        } else {
            return redirect()->route('menus.index')->with('error', 'Menu not found');
        }
    }
}
