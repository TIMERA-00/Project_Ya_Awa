<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $categories = Category::query()->get();
        $products = Product::query()->get();

        return Inertia::render('Welcome', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
