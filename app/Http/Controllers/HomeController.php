<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

use App\Models\User;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\Orden;

class HomeController extends Controller
{
	public function redirect()
	{
		$usertype = Auth::user()->type;

		if ($usertype == '1') {
			return view('admin.home');
		} else {
			$data = Producto::paginate(3);
			$user = auth()->user();
			$count = carrito::where('phone', $user->phone)->count();
			return view('user.home', compact('data', 'count'));
		}
	}

	public function principal()
	{
		if (Auth::user()) {
			$user = auth()->user();
			$count = carrito::where('phone', $user->phone)->count();
			return view('user.home', compact('count'));
		} else {
			return view('user.home');
		}
	}

	public function productos()
	{
		$data = Producto::all();

		if (Auth::user()) {
			$user = auth()->user();
			$count = carrito::where('phone', $user->phone)->count();
			return view('user.products', compact('data', 'count'));
		} else {
			return view('user.products', compact('data'));
		}
	}

	public function index()
	{

		if (Auth::id()) {
			return redirect('redirect');
		} else {
			return view('user.home');
		}
	}

	public function addCart(Request $request, $id)
	{
		if (Auth::id()) {
			$user = auth()->user();
			$producto = producto::find($id);
			$carrito = new Carrito();

			$carrito->name = $user->name;
			$carrito->phone = $user->phone;
			$carrito->address = $user->address;
			$carrito->productTitle = $producto->title;
			$carrito->price = $producto->price;
			$carrito->quantity = $request->quantity;

			$carrito->save();

			return redirect()->back()->with('message', 'Producto añadido al carrito');
		} else {
			return redirect('login');
		}
	}

	public function showCart()
	{
		$user = auth()->user();
		$cart = carrito::where('phone', $user->phone)->get();
		$count = carrito::where('phone', $user->phone)->count();
		return view('user.showCart', compact('count', 'cart'));
	}

	public function deleteProductCart($id)
	{
		$data = carrito::find($id);
		$data->delete();

		return redirect()->back()->with('message', 'Producto eliminado del carrito');
	}

	public function confirmOrden(Request $request)
	{
		$user = auth()->user();
		$name = $user->name;
		$phone = $user->phone;
		$address = $user->address;

		if (!$request->productTitle) {
			return redirect()->back()->with('message', 'Primero debes añadir productos al carrito');
		}

		foreach ($request->productTitle as $key => $productTitle) {
			$order = new Orden;
			$order->productTitle = $request->productTitle[$key];
			$order->quantity = $request->quantity[$key];
			$order->price = $request->price[$key];
			$order->name = $name;
			$order->phone = $phone;
			$order->address = $address;
			$order->status = 'No entregado';

			$order->save();
		}
		
		DB::table('carritos')->where('phone', $phone)->delete();
		return redirect()->back()->with('message', 'La orden ha sido registrada');
	}

	public function perfil()
	{
		$user = auth()->user();
		$count = carrito::where('phone', $user->phone)->count();
		$data = producto::all();
		return view('user.perfil', compact('count', 'data'));
	}

	public function updateInfo($id)
	{
		$user = User::find($id);
		$data = Producto::all();
		$count = carrito::where('phone', $user->phone)->count();

		return view('user.updateInfo', compact('data','count'));
	}

	public function updateInfo2(Request $request, $id)
	{
		$user = user::find($id);
		$count = carrito::where('phone', $user->phone)->count();

		$user->name = $request->name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->address = $request->address;

		$user->save();

		return view('user.perfil', compact('count'))->with('message', 'Información modificada correctamente');
	}

	public function pdf($id)
	{
		$user = user::find($id);
		$pdf = PDF::loadView('user.pdf', compact('user'))->setOptions(['defaultFont' => 'sans-serif']);
		return $pdf->download('Comprobante.pdf');
	}

}
