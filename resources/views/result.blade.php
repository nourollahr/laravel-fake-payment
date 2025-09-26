<!doctype html>
<html>
<head><meta charset="utf-8"><title>Payment Result</title></head>
<body>
<h1>Payment Result</h1>
<p>Transaction: {{ $result['transaction_id'] }}</p>
<p>Amount: {{ $amount }} ریال</p>
<p>Status: {{ $result['status'] }}</p>
<p>Message: {{ $result['message'] }}</p>
</body>
</html>
