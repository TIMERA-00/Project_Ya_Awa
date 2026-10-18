<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = json_decode(
            file_get_contents(database_path('data/data.json')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        DB::transaction(function () use ($data): void {
            Model::unguarded(function () use ($data): void {

                // 1. Catégories
                foreach ($data['categories'] as $category) {
                    Category::updateOrCreate(
                        ['id' => (int) $category['id']],
                        [
                            'name' => $category['name'],
                            'color' => $category['color'],
                            'image' => $category['image'],
                        ]
                    );
                }

                // 2. Produits
                foreach ($data['products'] as $product) {
                    Product::updateOrCreate(
                        ['id' => (int) $product['id']],
                        [
                            'categorie_id' => (int) $product['categoryId'],
                            'name' => $product['name'],
                            'description' => $product['description'] ?? null,
                            'origin' => $product['origin'] ?? null,
                            'unit' => $product['unit'],
                            'image' => $product['image'],
                            'price' => $product['price'],
                            'salle_price' => $product['salePrice'] ?? null,
                            'stock' => $product['stock'],
                            'active' => $product['active'],
                            'feature' => $product['featured'],
                        ]
                    );
                }

                // 3. Zones de livraison
                foreach ($data['deliveryZones'] as $zone) {
                    DeliveryZone::updateOrCreate(
                        ['id' => (int) $zone['id']],
                        [
                            'name' => $zone['name'],
                            'fee' => $zone['fee'] ?? null,
                        ]
                    );
                }

                // 4. Promotions
                foreach ($data['promotions'] as $promotion) {
                    Promotion::updateOrCreate(
                        ['id' => (int) $promotion['id']],
                        [
                            'code' => $promotion['code'],
                            'percentage' => $promotion['percentage'],
                            'active' => $promotion['active'],
                            'expire_at' => $promotion['expiresAt'] ?? null,
                        ]
                    );
                }

                // 5. Utilisateur administrateur de démonstration
                $admin = User::query()->firstOrNew([
                    'email' => 'admin@teranga.test',
                ]);

                $admin->name = 'Administrateur Teranga';

                if (! $admin->exists) {
                    $admin->password = 'password';
                }

                $admin->is_admin = true;
                $admin->save();

                // 6. Commandes, clients fictifs et articles
                foreach ($data['orders'] as $orderData) {
                    $customer = $orderData['customer'];

                    $email = 'client-'
                        . Str::slug($orderData['id'])
                        . '@teranga.test';

                    $user = User::query()->firstOrNew([
                        'email' => $email,
                    ]);

                    $user->name = $customer['fullName'];

                    if (! $user->exists) {
                        $user->password = 'password';
                    }

                    $user->save();

                    $createdAt = Carbon::parse($orderData['createdAt']);
                    $updatedAt = Carbon::parse($orderData['updatedAt']);

                    $savedOrder = Order::updateOrCreate(
                        ['reference' => $orderData['reference']],
                        [
                            'user_id' => $user->id,
                            'checkout_token' => (string) Str::uuid(),
                            'delivery_zone_id' => (int) $customer['zoneId'],
                            'zone_name' => $customer['zoneName'],
                            'address' => $customer['address'],
                            'fulfillment_mode' => $orderData['fulfillmentMode'],
                            'note' => $orderData['note'] ?? null,
                            'sub_total' => $orderData['subtotal'],
                            'discount_percentage' =>
                                $orderData['discount']['percentage'] ?? 0,
                            'discount_amount' =>
                                $orderData['discount']['amount'] ?? 0,
                            'total' => $orderData['total'],
                            'status' => $orderData['status'],
                            'stock_applied' => $orderData['stockApplied'],
                            'stock_restored' => $orderData['stockRestored'],
                            'canceled_at' => $orderData['status'] === 'ANNULEE'
                                ? $updatedAt
                                : null,
                        ]
                    );

                    // Conserver les dates du fichier JSON
                    DB::table('orders')
                        ->where('id', $savedOrder->id)
                        ->update([
                            'created_at' => $createdAt,
                            'updated_at' => $updatedAt,
                        ]);

                    foreach ($orderData['items'] as $item) {
                        OrderItem::updateOrCreate(
                            [
                                'order_id' => $savedOrder->id,
                                'products_id' => (int) $item['productId'],
                            ],
                            [
                                'name' => $item['name'],
                                'unit' => $item['unit'],
                                'unit_price' => $item['unitPrice'],
                                'quantity' => $item['quantity'],
                                'line_total' => $item['lineTotal'],
                            ]
                        );
                    }
                }
            });
        });
    }
}
