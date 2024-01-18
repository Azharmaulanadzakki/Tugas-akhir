<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Package;
use App\Models\Langganan;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function showPaymentForm(Transaksi $transaksi)
    {
        $packages = Package::all();
        return view('pages.langganan.index', compact('transaksi', 'packages'));
    }

    public function showPayment(Package $packages)
    {
        $user = Auth::user();

        // Cek apakah pengguna sudah memiliki langganan aktif untuk paket ini
        $existingLangganan = Langganan::where('user_id', $user->id)
            ->where('package_id', $packages->id)
            ->where('end_date', '>', now())
            ->first();

        if ($existingLangganan) {
            // Jika ada langganan yang masih aktif, berikan pesan atau tampilkan tombol yang sesuai
            return view('pages.langganan.berlangganan', compact('package'));
        }

        // Jika tidak ada langganan yang aktif, lanjutkan dengan proses pembayaran
        $snapToken = $this->getSnapToken($packages);
        $order_id = 'GLUA_' . Str::uuid();
        $this->createSubscription($packages, $order_id);

        return view('pages.langganan.payment', compact('package', 'snapToken'));
    }


    private function getSnapToken(Package $packages)
    {
        // Set Midtrans configuration
        Config::$serverKey = config('services.serverKey');
        Config::$isProduction = config('services.isProduction');

        $user = Auth::user();

        $transactionDetails = [
            'order_id'     => 'LWA_' . Str::uuid(),
            'gross_amount' => $packages->harga,
        ];

        // Prepare customer details
        $customerDetails = [
            'first_name' => $user->name,
            'email'      => $user->email,
            // Add more customer details if needed
        ];

        // Prepare item details (product details)
        $itemDetails = [
            'id'            => $packages->id,
            'price'         => $packages->harga,
            'quantity'      => 1,
            'name'          => $packages->nama,
            'brand'         => 'LearnWithAzhar', // Add your brand name
            'category'      => 'Subscription', // Add your product category
            'merchant_name' => 'LearnWithAzhar', // Add your merchant name
            // Add more item details if needed
        ];

        // Create transaction data
        $transactionData = [
            'transaction_details' => $transactionDetails,
            'customer_details'    => $customerDetails,
            'item_details'        => [$itemDetails], // Wrap item details in an array
            // Add more transaction data if needed
        ];

        // Get Snap Token from Midtrans
        $snapToken = Snap::getSnapToken($transactionData);

        return $snapToken;
    }

    public function createSubscription(Package $package, $order_id)
    {
        $user = Auth::user();
        $startDate = now(); // Atau sesuaikan dengan waktu mulai langganan

        // Hitung tanggal berakhir berdasarkan durasi paket
        $endDate = $startDate->copy()->addMonths($package->durasi);

        // Tambahkan entri baru ke tabel subscription
        Langganan::create([
            'user_id'    => $user->id,
            'package_id' => $package->id,
            'start_date' => $startDate,
            'end_date'   => $endDate,
            'order_id'   => $order_id, // Sesuaikan dengan kolom yang sesuai dengan order ID di tabel transaksi
        ]);

        // Atau sesuaikan dengan tindakan lain yang perlu Anda lakukan setelah pembayaran berhasil

        return redirect()->route('pembayaran.showForm', $package)->with(['success' => 'Langganan Berhasil Dibuat!']);
    }
}