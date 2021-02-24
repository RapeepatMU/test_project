<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\Category;

class TransactionController extends Controller
{
    public function getTransaction()
    {
        $transactions = Transaction::all();
        return response([
            'transactions' => $transactions
        ]);
    }

    public function createTransaction(Request $request)
    {
        $transactions = new Transaction();
        $transactions->category_id = $request->input('category_id');
        $transactions->category = $request->input('category');
        $transactions->amount = $request->input('amount');
        $transactions->note = $request->input('note');
        $transactions->save();

        return response()->json(['transactions' => $transactions]);
    }

    public function update(Request $request, $id)
    {
        $transactions = Transaction::find($id);
        $transactions->category_id = $request->input('category_id');
        $transactions->category = $request->input('category');
        $transactions->amount = $request->input('amount');
        $transactions->note = $request->input('note');
        $transactions->update();

        if (is_null($transactions)) {
            return response()->json(['message' => "transaction not found"]);
        }
        return response()->json(['transactions' => $transactions]);
    }

    public function delete($id)
    {
        $transactions = Transaction::find($id);
        $transactions->delete();

        if (is_null($transactions)) {
            return response()->json(['message' => "transaction not found"]);
        }
        return response()->json(['transactions' => $transactions]);
    }
}
