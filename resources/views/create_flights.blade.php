<!DOCTYPE html>
<html>

<body style="direction: rtl; float: right; text-align:center;">

    <h2>HTML Forms</h2>

    {{-- @if ($errors->any())
 <div class="alert alert-dangerr">
    <ul>
        @foreach ($errors->all() as $errors)
       <li> {{ $errors }}</li>
        @endforeach
    </ul>

</div>

@endif --}}


   <!-- Create post form  -->

    <form action="{{ route('store_flight') }}" method="Post">
        @csrf
        <label for="name">اسم الرحلة:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br><br>
        @error('name')
            <span style="color: red">{{ $message }}</span> <br>
        @enderror
        <label for="notes"> ملاحظات ان وجدت:</label><br>
        <input type="text" id="notes" name="notes" value="{{ old('notes') }}"><br><br>

        <input type="submit" value="اضف">
    </form>



</body>

</html>
