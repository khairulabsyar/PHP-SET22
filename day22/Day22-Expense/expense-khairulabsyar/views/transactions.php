<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    table tr th,
    table tr td {
        padding: 5px;
        border: 1px #eee solid;
    }

    tfoot tr th,
    tfoot tr td {
        font-size: 20px;
    }

    tfoot tr th {
        text-align: right;
    }
    </style>
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
            <?php
            // had a hard time to figure out how to place the information and ended up doing like this
            for ($i = 1; $i < count($hello[0]); $i++) {
                echo '<tr>';
                // change the date format
                echo '<th>' . date('d m, Y', strtotime($hello[0][$i])) . '</th>';
                echo '<th>' . $hello[1][$i] . '</th>';
                echo '<th>' . $hello[2][$i] . '</th>';
                // adding style using if statement on the first character
                if ($world[$i][0] == "R") {
                    echo '<th>' . '<span style="color: green">' . $world[$i] . '</span>' . '</th>';
                } else {
                    echo '<th>' . '<span style="color: red">' . $world[$i] .  '</span>' . '</th>';
                }
                echo '</tr>';
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>
                    <?php
                    echo "RM " . $money[0];
                    ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>
                    <?php
                    echo "-RM " . $money[1];
                    ?>
                </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>
                    <?php
                    echo "RM " . $money[2];
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>