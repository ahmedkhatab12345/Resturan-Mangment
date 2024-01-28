<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Menu;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
class ItemController extends Controller
{
    use UploadTrait;
    public function index()
    {
        $items = Item::all();
        return view('dashboard.items.index',compact('items'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('dashboard.items.create',compact('menus'));
    }

    public function store(ItemRequest $request)
    {
        try {
            //save photo
            $file_name=$this ->saveImage($request->photo,'images/dashboard/items');
            //fetch data
            $items = $request->all();
            //store data
            $items = Item::create([              
                'name'=> $items['name'],
                'description'=> $items['description'],
                'price'=> $items['price'],
                'menu_id'=> $items['menu_id'],
                'photo'=>$file_name,
            ]);
            return redirect()->route('items.index')->with('success', 'Item added successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error adding Item: ' . $e->getMessage())->withInput();
            }
    }

    public function edit($id)
    {
        $items = Item::find($id);
        $menus = Menu::all();
        if (!$items) {
            return redirect()->route('items.index')->with(['error' => 'This Item Is Not Found']);
        }

        return view('dashboard.items.edit', compact('items','menus'));
    }

    public function update(Request $request, $id)
    {
        try {
            $items = Item::find($id);
        
            if (!$items) {
                return redirect()->route('items.index')->with('error', 'item not found');
            }
        
            // Check if the request has an image
            if ($request->hasFile('photo')) {
                // Delete the old image
                if ($items->photo) {
                    Storage::delete($items->photo);
                }
        
                // Save the new image
                $file_name = $this->saveImage($request->photo, 'images/dashboard/items');
        
                // Update the items with the new image
                $items->update([
                    'photo' => $file_name,
                ]);
            }
        
            // Update other data
            $items->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'menu_id' => $request->menu_id,
            ]);
        
            return redirect()->route('items.index')->with('success', 'Item updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating Item: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(string $id)
    {
        $items = Item::destroy($id);

        if ($items) {
            return redirect()->route('items.index')->with('success', 'Item deleted successfully');
        } else {
            return redirect()->route('items.index')->with('error', 'Item not found');
        }
    }
}
