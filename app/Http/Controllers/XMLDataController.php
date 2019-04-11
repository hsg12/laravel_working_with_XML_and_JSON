<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class XMLDataController extends Controller
{
    protected $path = 'storage/app/public/products.xml';

    public function index() 
    {
        $products = [];

        if ( File::exists(base_path($this->path))) {
            $products = new \SimpleXMLElement(base_path($this->path), NULL, true);
        }

        return view('xml.index', compact('products'));
    }

    public function add() 
    {
        $result = 'error';

        $name     = trim(strip_tags(request('name')));
        $quantity = abs(request('quantity'));
        $price    = abs(request('price'));

        if (!empty($name) && !empty($quantity) && !empty($price)) {

            if ( File::exists(base_path($this->path))) {
                $products = new \SimpleXMLElement(base_path($this->path), NULL, true);
            } else {
                $products = new \SimpleXMLElement('<products></products>');
            }
    
            $product = $products->addChild('product');
            $product->addChild('name', $name);
            $product->addChild('quantity', $quantity);
            $product->addChild('price', $price);
            $product->addChild('datetime', date('m/d/Y H:i:s'));
            $product->addChild('total', number_format($quantity * $price, 2));
    
            // Will save data as xml file but without pretty formatting
            // $products->asXML(base_path($this->path));
    
            // Will save data as xml file with pretty formatting
            // Start block
            $dom = new \DOMDocument('1.0');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $dom->loadXML($products->asXML());
            $dom->save(base_path($this->path));
            // End block

            $result = $products;
        }

        // Without ajax
        // return redirect()->action('XMLDataController@index');

        // With ajax
        return response()->json([
            'result' => $result
        ]);
    }
}
