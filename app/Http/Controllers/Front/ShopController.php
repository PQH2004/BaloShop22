<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Ultilities\Common;
use App\Models\Luottruycap;
use Illuminate\Http\Request;
use App\Models\ProductComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;

class ShopController extends Controller
{
    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;

    public function __construct(
        ProductServiceInterface $productService,
        ProductCommentServiceInterface $productCommentService,
        ProductCategoryServiceInterface $productCategoryService,
        BrandServiceInterface $brandService
    ) {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productCategoryService = $productCategoryService;
        $this->brandService = $brandService;
    }

    public function show($id)
    {

        $categories = $this->productCategoryService->all();

        $brands = $this->brandService->all();
        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);
        $lang = Cookie::get('lang');


        return view('front.shop.show', compact('product', 'relatedProducts', 'categories', 'brands', 'lang'));
    }

    public function postComment(Request $request)
    {
        $this->productCommentService->create($request->all());

        return redirect()->back();
    }

    public function index(Request $request)
    {


        $categories = $this->productCategoryService->all();

        $brands = $this->brandService->all();


        $products = $this->productService->getProductOnIndex($request);
        $lang = Cookie::get('lang');
     
        
      
        return view('front.shop.index', [
            'products' => $products,
            'categories'  => $categories,
            'brands' => $brands,

            'lang' => $lang,

        ]);
    }

    public function category($categoryName, Request $request)
    {
        $categories = $this->productCategoryService->all();

        $brands = $this->brandService->all();
        $lang = Cookie::get('lang');

        $products = $this->productService->getProductsByCategory($categoryName, $request);
        return view('front.shop.index', [
            'categories' => $categories,
            'products' => $products,
            'brands' => $brands,
            'lang' => $lang,
        ]);
    }

    public function getComment()
    {
        $comment = ProductComment::all();

        return $comment;
    }
}
