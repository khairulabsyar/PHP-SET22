<html>

<head>
    <title>MVC Test</title>
</head>

<body>
    <h2>Home Page</h2>
    <hr>
    <form action="/" method="post">
        <label for="email">Email
            <input name="email" type="email">
        </label>
        <label for="name">Name
            <input name="name" type="text">
        </label>
        <label for="amount">Amount
            <input name="amount" type="number">
        </label>
        <button type="submit">Create</button>
    </form>
    <div>
        <?php if (!empty($invoice)) : ?>
        Invoice ID: <?= $invoice['id'] ?> <br />
        Invoice Amount: <?= $invoice['amount'] ?> <br />
        User: <?= $invoice['full_name'] ?> <br />
        <?php endif ?>
    </div>
</body>

</html>