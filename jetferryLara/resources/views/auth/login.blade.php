<x-layout>
    <div class="container">
        <h3>Login Page</h3>

        <form action="{{ route('custome.login') }}" method="POST">
            @csrf
            <div>
                <input type="text" name="email" placeholder="email">
                @error('email')
                    {{ $message }}
                @enderror
            </div><br>
            <div>
                <input type="text" name="password" placeholder="password">
                @error('password')
                    {{ $message }}
                @enderror
            </div><br>
            <div>
                <input type="submit" value="login">
            </div>
        </form>
    </div>
</x-layout>
