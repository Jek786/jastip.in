<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Buyer;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChatController extends Controller
{
    // Tampilkan chat dengan buyer tertentu
    public function show($buyerId)
    {
        $buyer = Buyer::with(['orders.orderDetails.product'])->findOrFail($buyerId);
        
        $chats = Chat::where('IDReceiver', $buyerId)
                    ->orWhere('IDSender', $buyerId)
                    ->orderBy('sent_at', 'asc')
                    ->get();

        // Ambil order terakhir dari buyer ini
        $latestOrder = Order::where('IDBuyer', $buyerId)
                           ->with(['orderDetails.product', 'restoran'])
                           ->latest('IDOrder')
                           ->first();

        return view('chat.show', compact('buyer', 'chats', 'latestOrder'));
    }

    // Kirim pesan baru (AJAX)
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|integer',
            'sender_id' => 'required|integer',
            'message' => 'required|string',
            'sender_name' => 'nullable|string',
            'receiver_name' => 'nullable|string'
        ]);

        $chat = Chat::create([
            'IDSender' => $validated['sender_id'],
            'IDReceiver' => $validated['receiver_id'],
            'sender_name' => $validated['sender_name'] ?? '',
            'receiver_name' => $validated['receiver_name'] ?? '',
            'message' => $validated['message'],
            'sent_at' => Carbon::now(),
            'is_read' => 0
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'IDChat' => $chat->IDChat,
                'message' => $chat->message,
                'sent_at' => $chat->sent_at->format('H.i'),
                'type' => 'sent'
            ]
        ]);
    }

    // Get messages untuk buyer tertentu (AJAX)
    public function getMessages($buyerId)
    {
        $messages = Chat::where('IDReceiver', $buyerId)
                       ->orWhere('IDSender', $buyerId)
                       ->orderBy('sent_at', 'asc')
                       ->get()
                       ->map(function($chat) use ($buyerId) {
                           return [
                               'IDChat' => $chat->IDChat,
                               'message' => $chat->message,
                               'sent_at' => Carbon::parse($chat->sent_at)->format('H.i'),
                               'type' => $chat->IDSender == $buyerId ? 'received' : 'sent',
                               'is_read' => $chat->is_read
                           ];
                       });

        return response()->json($messages);
    }

    // Proses refund
    public function refund(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'buyer_id' => 'required|integer'
        ]);

        $order = Order::findOrFail($validated['order_id']);
        $buyer = Buyer::findOrFail($validated['buyer_id']);

        // Simpan pesan sistem refund
        $chat = Chat::create([
            'IDSender' => 0, // 0 untuk sistem
            'IDReceiver' => $buyer->IDBuyer,
            'sender_name' => 'System',
            'receiver_name' => $buyer->fullName,
            'message' => "Refund sebesar Rp " . number_format($order->Total, 0, ',', '.') . " telah diproses",
            'sent_at' => Carbon::now(),
            'is_read' => 0
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Refund berhasil diproses',
            'data' => [
                'IDChat' => $chat->IDChat,
                'message' => $chat->message,
                'sent_at' => Carbon::parse($chat->sent_at)->format('H.i'),
                'type' => 'system'
            ]
        ]);
    }

    // Akhiri chat
    public function endChat(Request $request)
    {
        $validated = $request->validate([
            'buyer_id' => 'required|integer'
        ]);

        $buyer = Buyer::findOrFail($validated['buyer_id']);

        $chat = Chat::create([
            'IDSender' => 0,
            'IDReceiver' => $buyer->IDBuyer,
            'sender_name' => 'System',
            'receiver_name' => $buyer->fullName,
            'message' => "Chat dengan " . $buyer->fullName . " telah diakhiri",
            'sent_at' => Carbon::now(),
            'is_read' => 0
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Chat berhasil diakhiri',
            'data' => [
                'IDChat' => $chat->IDChat,
                'message' => $chat->message,
                'sent_at' => Carbon::parse($chat->sent_at)->format('H.i'),
                'type' => 'system'
            ]
        ]);
    }

    // Mark chat as read
    public function markAsRead($chatId)
    {
        $chat = Chat::findOrFail($chatId);
        
        // Update is_read karena tidak ada timestamps
        \DB::table('chat')
            ->where('IDChat', $chatId)
            ->update(['is_read' => 1]);

        return response()->json([
            'success' => true
        ]);
    }
}