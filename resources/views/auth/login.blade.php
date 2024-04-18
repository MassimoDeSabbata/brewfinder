<x-guest-layout>

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="row">
        <div class="col-12" style="padding-left: 30vw; padding-right: 30vw;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="login">Email / username</label>
                    <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>