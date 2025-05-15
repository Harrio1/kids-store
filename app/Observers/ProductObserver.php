<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObserver
{
    /**
     * Handle the Product "creating" event.
     * This runs before the product is saved to the database.
     */
    public function creating(Product $product): void
    {
        // Only generate SKU if it's not already set
        if (empty($product->sku)) {
            $product->sku = $this->generateSku($product);
        }
    }

    /**
     * Generate a unique SKU for the product.
     * Format: [category prefix]-[random string]-[sequential number]
     */
    protected function generateSku(Product $product): string
    {
        // Category prefix
        $prefix = 'KS'; // Default Kids Store prefix
        
        // Add category-specific prefix if available
        if (!empty($product->category)) {
            $categoryMap = [
                'boys' => 'BOY',
                'girls' => 'GRL',
                'newborns' => 'NWB',
            ];
            
            if (isset($categoryMap[$product->category])) {
                $prefix = $categoryMap[$product->category];
            }
        } elseif (!empty($product->category_id)) {
            // Try to get category name from relationship for more specific prefix
            $category = \App\Models\Category::find($product->category_id);
            if ($category) {
                // Use first 3 characters of category name
                $prefix = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $category->name), 0, 3));
            }
        }
        
        // Random string (4 chars)
        $randomStr = strtoupper(Str::random(4));
        
        // Sequential number (get the latest product count + 1)
        $count = Product::count() + 1;
        $sequential = str_pad($count, 4, '0', STR_PAD_LEFT);
        
        // Combine parts to form the SKU: PREFIX-RANDOM-0001
        $sku = "{$prefix}-{$randomStr}-{$sequential}";
        
        // Ensure the SKU is unique (in the rare case of collision)
        while (Product::where('sku', $sku)->exists()) {
            $randomStr = strtoupper(Str::random(4));
            $sku = "{$prefix}-{$randomStr}-{$sequential}";
        }
        
        return $sku;
    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
