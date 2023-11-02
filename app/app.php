<?php

declare(strict_types=1);

function getTransactionFiles(string $dirPath): array {

    $files = [];

    foreach (scandir($dirPath) as $file) {
        
        if (is_dir($file)) {
            
            continue;
        }

        $files[] = $dirPath . $file;
    }

    return $files;

}

function getTransactions(string $filePath): array {

    if (! file_exists($filePath)) {

        trigger_error('File ' . $filePath . ' does not exist', E_USER_ERROR);

    }

    $file = fopen($filePath, 'r');

    $transaction = fgetcsv($file);

    $transactions = [];

    while (($transaction = fgetcsv($file)) !== false) {
        
        $transactions[] = parseTransaction($transaction);

    }

    return $transactions;

}

function parseTransaction(array $transactionRow): array {

    [$date, $check, $description, $amount] = $transactionRow;

    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date' => $date,
        'check' => $check,
        'description' => $description,
        'amount' => $amount
    ];

}

function calculateTotals(array $transactions): array {

    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach ($transactions as $transaction) {
        
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            
            $totals['totalIncome'] += $transaction['amount'];
        
        } else {

            $totals['totalExpense'] += $transaction['amount'];

        }
    }

    return $totals;

}