<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Producto;
use App\Models\Orden;
use App\Models\User;

class AdminController extends Controller
{
	public function product()
	{
		if (Auth::id()) {
			if (Auth::user()->type == '1') {
				return view('admin.product');
			} else {
				return redirect()->back();
			}
		} else {
			return redirect('login');
		}
	}

	public function uploadProduct(Request $request)
	{
		$data = new Producto;

		// $path = $request->file('file')->storeAs(
		// 	'public/imagenes',
		// 	$request->title . '.' . $request->file('file')->getClientOriginalExtension()
		// );

		$imagenName = time().'.'.$request->file('file')->getClientOriginalExtension();

		// $request->file->move('imagenes', $path);
		$request->file->move('imagenes', $imagenName);

		$data->title = $request->title;
		$data->price = $request->price;
		$data->description = $request->des;
		$data->quantity = $request->quantity;
		$data->image = $imagenName;

		$data->save();

		return redirect()->back()->with('message', 'Producto añadido correctamente');
	}

	public function showProduct()
	{
		$data = producto::all();
		return view('admin.showProduct', compact('data'));
	}

	public function deleteProduct($id)
	{
		$data = producto::find($id);
		$data->delete();

		return redirect()->back()->with('message', 'Producto eliminado correctamente');
	}

	public function updateView($id)
	{
		$data = producto::find($id);

		return view('admin.updateView', compact('data'));
	}

	public function updateProduct(Request $request, $id)
	{
		$data = producto::find($id);

		$image = $request->file;

		if ($image) {
			$imageName =  time() . '.' . $image->getClientOriginalExtension();
			$request->file->move('productImage', $imageName);
			$data->$image = $imageName;
		}

		$data->title = $request->title;
		$data->price = $request->price;
		$data->description = $request->des;
		$data->quantity = $request->quantity;

		$data->save();

		return redirect()->back()->with('message', 'Producto modificado correctamente');
	}

	public function showOrder()
	{
		$order = orden::all();
		return view('admin.showOrder', compact('order'));
	}

	public function updateStatus($id)
	{
		$order = orden::find($id);
		$order->status = 'Entregado';
		$order->save();

		return redirect()->back();
	}
}
