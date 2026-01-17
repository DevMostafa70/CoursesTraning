<!DOCTYPE html>
<html>

<body style="direction: rtl; float: right; text-align:center;">

    <h2>HTML Forms</h2>

    <form action="{{ route('country.store') }}" method="Post">
        @csrf
        <label for="name">اسم الدولة:</label><br>
        <input type="text" id="name" name="name" value=""><br><br>
        @error('name')
            <span style="color: red">{{ $message }}</span> <br>
        @enderror

        <input type="submit" value="اضف">
    </form>



</body>

</html>
