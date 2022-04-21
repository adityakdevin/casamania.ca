<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <script>
        window.opener.postMessage({token: "{{ $token }}"}, '*')
        window.close()
        localStorage.setItem('facebook_token', "{{ $token }}")
    </script>
</head>
<body>
</body>
</html>
