<x-guest-minimal-layout>
    <div class="login-header">
        <div class="logo">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white"/>
                <path d="M2 17L12 22L22 17" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2 12L12 17L22 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <h1>Create Account</h1>
        <p>Join us today</p>
    </div>
    
    <div class="login-body">
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="error-message">
                <ul style="margin: 0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input 
                    id="name" 
                    class="form-input" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Enter your full name"
                />
            </div>
            
            <!-- Username -->
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input 
                    id="username" 
                    class="form-input" 
                    type="text" 
                    name="username" 
                    value="{{ old('username') }}" 
                    required 
                    autocomplete="username"
                    placeholder="Choose a username"
                />
            </div>
            
            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input 
                    id="email" 
                    class="form-input" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                    placeholder="Enter your email"
                />
            </div>
            
            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    id="password" 
                    class="form-input"
                    type="password"
                    name="password"
                    required 
                    autocomplete="new-password"
                    placeholder="Create a password"
                />
            </div>
            
            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input 
                    id="password_confirmation" 
                    class="form-input"
                    type="password"
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="Confirm your password"
                />
            </div>
            
            <button type="submit" class="btn-login">
                Create Account
            </button>
        </form>
        
        <div class="divider">
            <span>or</span>
        </div>
        
        <div class="signup-link">
            Already have an account? 
            <a href="{{ route('login') }}">Sign in</a>
        </div>
    </div>
</x-guest-minimal-layout>