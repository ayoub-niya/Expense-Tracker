<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transactions</title>
    <style>
        body {
            background-color: #2c3e50;
            font-size: 16px;
            margin: 0;
            padding: 0;
        }

        table {
            width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        table th, table td {
            background-color: #dcdde1;
            padding: 4px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <th>Date</th>
            <th>Check</th>
            <th>Description</th>
            <th>Amount</th>
        </thead>
        <tbody>
            <?php if (! empty($transactions)) : ?>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td><?= $transaction['date'] ?></td>
                    <td><?= $transaction['check'] ?></td>
                    <td><?= $transaction['description'] ?></td>
                    <td><?= $transaction['amount'] ?></td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income</th>
                <td><?= $totals['totalIncome'] ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense</th>
                <td><?= $totals['totalExpense'] ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total</th>
                <td><?= $totals['netTotal'] ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>