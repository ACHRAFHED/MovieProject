<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
  
class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
   
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }
    public function paiement($total)
    {
        
        return view('paiement',array('total' => $total));
        
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart(Request $request, $id)
    {
        
   
        $number=(int)$id;
        $product = Product::findOrFail($number);
         $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
       
        session()->put('cart', $cart);
        session()->put('product', $product);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
  
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    
}
