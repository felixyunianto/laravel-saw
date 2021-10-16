<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Product;

class CalculatingController extends Controller
{
    public function index(){
        $criterias = Criteria::all();

        $newCriterias = [];
        
        foreach($criterias as $criteria){
            $newCriterias[] = [
                'name' => $criteria->name,
                'value' => $criteria->value,
                'type' => $criteria->type,
                'weight' => (int)$criteria->value / (int) $criterias->sum('value'),
            ];
        }

        $products = Product::all();

        foreach($newCriterias as $key => $newCriteria){
                       
            if($newCriteria['type'] == 'cost'){
                $newCriteria['divider'] = $products->min(join("_", explode(' ', strtolower($newCriteria['name']))));
            }else{
                $newCriteria['divider'] = $products->max(join("_", explode(' ', strtolower($newCriteria['name']))));
            }

            $newCriterias[$key] = $newCriteria;
        }

        $normalization = [];

        foreach($products as $product){
            $normalization[] = [
                'product_name' => $product->product_name,
                'price' => $this->filter($newCriterias, $product, 'price',2),
                'quality' => $this->filter($newCriterias, $product, 'quality',3),
                'feature' => $this->filter($newCriterias, $product, 'feature',4),
                'popular' => $this->filter($newCriterias, $product, 'popular',5),
                'after_sales' => $this->filter($newCriterias, $product, 'after_sales', 6),
                'strength' => $this->filter($newCriterias, $product, 'strength',7),
            ];
        }

        $results = [];
        // dd($normalization);

        foreach($normalization as $n){
            $results[] = [
                'product_name' => $n['product_name'],
                'result'=>$this->calculateResult($newCriterias, $n)
            ];
        }

        function comparator($object1, $object2) {
            return $object1->score > $object2->score;
        }

        // usort($results, 'comparator');

        $resultSorted = collect($results)->sortByDesc(function ($item, $key){
            return $item['result'];
        },);

        return view('calculate', compact('criterias', 'newCriterias', 'normalization', 'resultSorted'));
    }

    function filter($array, $object, $column, $index) {
        $objectFilter = array_filter($array, function($e) use($object, $index){
            return $e['name'] === ucwords(join(' ', explode('_',array_keys($object->getOriginal())[$index])));
        })[$index - 2];

        if($objectFilter['type'] == 'cost'){
            return $objectFilter['divider'] / $object[$column];
        }else{
            return $object[$column] / $objectFilter['divider'];
        }
    }

    function calculateResult($array, $object){
        $i = 0;
        $result = 0;
        foreach($object as $key => $o){
            $temp = array_filter($array, function($e) use ($object, $key) {
                        return $e['name'] === ucwords(join(' ', explode('_', $key)));
                    });
            if($temp){
                $result = $result + array_filter($array, function($e) use ($object, $key) {
                    return $e['name'] === ucwords(join(' ', explode('_', $key)));
                })[$i]['weight'] * $o;
                $i++;
            }
            
        }

        return $result;
    }
}
