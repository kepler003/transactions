<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transactions</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
        <?php printTransactions() ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="3">Total Income:</th>
        <td><?php printIncome() ?></td>
      </tr>
      <tr>
        <th colspan="3">Total Expense:</th>
        <td><?php printExpense() ?></td>
      </tr>
      <tr>
        <th colspan="3">Net Total:</th>
        <td><?php printTotal() ?></td>
      </tr>
    </tfoot>
  </table>
</body>
</html>
