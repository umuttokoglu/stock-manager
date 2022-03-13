<?php

namespace App\Http\Controllers;

use App\Constants\RouteNameConstants;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    public function index(): Application|Factory|View
    {
        $products = Product::orderByDesc('created_at')->
        get([
            'id',
            'code',
            'name',
            'image',
            'amount',
            'height',
            'width',
            'color'
        ]);

        return view('pages.admin.products.index', compact('products'));
    }

    public function create(): Application|Factory|View
    {
        return view('pages.admin.products.form');
    }

    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $productCode = Uuid::uuid6()->toString();
        $name = $productCode . '.' . $request->file('product_image')->getClientOriginalExtension();

        $request->file('product_image')->move(public_path('product_images'), $name);

        Product::create([
            'code' => $productCode,
            'name' => $request->get('product_name'),
            'image' => $name,
            'amount' => $request->get('product_amount'),
            'height' => $request->get('product_height'),
            'width' => $request->get('product_width'),
            'color' => $request->get('product_color'),
        ]);

        return response()
            ->redirectToRoute(RouteNameConstants::PRODUCTS);
    }

    public function show(Product $product): Application|Factory|View
    {
        abort(404);
    }

    public function edit(Product $product): Application|Factory|View
    {
        return view('pages.admin.products.edit', compact('product'));
    }

    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        if ($request->hasFile('product_image')) {
            File::delete('product_images/' . $product->image);
            $name = $product->code . '.' . $request->file('product_image')->getClientOriginalExtension();

            $request->file('product_image')->move(public_path('product_images'), $name);

            $product->update([
                'image' => $name
            ]);
        }

        $product->update([
            'name' => $request->get('product_name'),
            'amount' => $request->get('product_amount'),
            'height' => $request->get('product_height'),
            'width' => $request->get('product_width'),
            'color' => $request->get('product_color'),
        ]);


        return response()
            ->redirectToRoute(RouteNameConstants::PRODUCTS);
    }

    public function destroy(Product $product)
    {
        abort(404);
    }
}
