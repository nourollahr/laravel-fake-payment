<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fake Payment</title>
</head>
<body>
<h1>Fake Payment Gateway</h1>
<p>Transaction: {{ $txn }}</p>
<p>Amount: {{ $amount }} ریال</p>

<form action="{{ route('fakepayment.submit') }}" method="POST">
    @csrf
    <input type="hidden" name="txn" value="{{ $txn }}">
    <input type="hidden" name="amount" value="{{ $amount }}">
    <input type="hidden" name="callback" value="{{ request()->query('callback') }}">
    <label for="status">Choose result:</label>
    <select name="status" id="status">
        <option value="success">Success</option>
        <option value="failed">Failed</option>
        <option value="timeout">Timeout</option>
    </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>
