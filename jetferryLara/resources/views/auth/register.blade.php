<x-layout>
    <h1>Register Page</h1>
    <div class="form">
        <form action="{{ route('custome.register') }}" method="post">
            @csrf

            <input type="text" name="name" placeholder="name">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
            <br><br>
            <input type="text" name="email" placeholder="email">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
            <br><br>
            <input type="text" name="password" placeholder="password">
            @error('password')
                <div>{{ $message }}</div>
            @enderror
            <br><br>
            <input type="text" name="password_confirmation" placeholder="Confirm password">
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
            <br><br>
            <input type="submit" value="Register">
        </form>
    </div>
</x-layout>
