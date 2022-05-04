<form action="/sender" method="POST">
    <input type="text" name="room">
    <input type="submit">
    {{ csrf_field() }}
</form>