<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\Category;

class ReportController extends Controller
{
    public function getReportByCategory()
    {

        $reortTransactions = Transaction::groupBy('category_id')
            ->selectRaw('sum(amount) as amount, category_id')
            ->get();

        return response([
            'transactions' => $reortTransactions
        ]);
    }
    public function getReportByDate()
    {
        $reortTransactions = Transaction::select(Transaction::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->selectRaw('sum(amount) as amount')
            ->get();

        return response([
            'transactions' => $reortTransactions
        ]);
    }

    public function updateReporCategoryById(Request $request, $id)
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

    public function deleteReporCategory($id)
    {
        $transactions = Transaction::find($id);
        $transactions->delete();

        if (is_null($transactions)) {
            return response()->json(['message' => "transaction not found"]);
        }
        return response()->json(['transactions' => $transactions]);
    }
}
