<html>
    <head>
        <title>Greeter</title>
    </head>
<body>
<form method="post" action="/pertemuan2/greet">
    @csrf
    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
    <!-- {{ csrf_field() }} -->
    <div>
        <label>Nama</label>
        <input type="text" name="nama">
    </div>
    <div>
        <input type="submit">
    </div>
</form>
</body>
</html>
