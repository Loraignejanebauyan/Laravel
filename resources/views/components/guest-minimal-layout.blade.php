<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Custom Styles -->
        <style>
            :root {
                --darkest: #262b15;
                --dark-gray: #3f3f3f;
                --olive-dark: #464b37;
                --olive-light: #848871;
                --olive-bright: #afb4ad;
                --text-primary: #f8f8f2;
                --text-secondary: #d1d5db;
                --border: #5a5f4a;
                --success: #84b082;
                --error: #d18484;
                --card-bg: #3a3f2d;
                --input-bg: #2d3222;
                --shadow: 0 4px 6px -1px rgba(38, 43, 21, 0.3), 0 2px 4px -1px rgba(38, 43, 21, 0.2);
                --shadow-lg: 0 10px 15px -3px rgba(38, 43, 21, 0.4), 0 4px 6px -2px rgba(38, 43, 21, 0.3);
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Work Sans', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: linear-gradient(135deg, var(--darkest) 0%, var(--olive-dark) 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
                position: relative;
                overflow: hidden;
            }
            
            body::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: 
                    radial-gradient(circle at 15% 25%, rgba(164, 132, 129, 0.1) 0%, transparent 25%),
                    radial-gradient(circle at 85% 75%, rgba(132, 136, 113, 0.15) 0%, transparent 30%),
                    radial-gradient(circle at 50% 50%, rgba(175, 180, 173, 0.08) 0%, transparent 40%);
                z-index: 0;
            }
            
            .login-container {
                width: 100%;
                max-width: 420px;
                background: var(--card-bg);
                border-radius: 18px;
                box-shadow: var(--shadow-lg);
                overflow: hidden;
                animation: fadeIn 0.6s ease-out;
                position: relative;
                z-index: 1;
                border: 1px solid var(--border);
                backdrop-filter: blur(8px);
            }
            
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px) scale(0.95);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }
            
            .login-header {
                background: linear-gradient(135deg, var(--darkest) 0%, var(--olive-dark) 70%, var(--olive-light) 100%);
                padding: 2.5rem 2rem;
                text-align: center;
                color: var(--text-primary);
                position: relative;
                overflow: hidden;
            }
            
            .login-header::before {
                content: '';
                position: absolute;
                top: -40%;
                left: -40%;
                width: 180%;
                height: 180%;
                background: 
                    conic-gradient(from 0deg, transparent, rgba(175, 180, 173, 0.15), transparent 40%);
                animation: rotate 15s linear infinite;
            }
            
            @keyframes rotate {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            
            .logo {
                position: relative;
                z-index: 2;
                margin-bottom: 1.5rem;
                display: inline-block;
            }
            
            .logo svg {
                width: 60px;
                height: 60px;
                filter: drop-shadow(0 3px 6px rgba(38, 43, 21, 0.4));
            }
            
            .login-header h1 {
                font-size: 2rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                letter-spacing: -0.02em;
                position: relative;
                z-index: 2;
                text-shadow: 0 2px 4px rgba(38, 43, 21, 0.5);
                color: var(--olive-bright);
            }
            
            .login-header p {
                font-size: 1.1rem;
                opacity: 0.85;
                font-weight: 300;
                position: relative;
                z-index: 2;
                color: var(--text-secondary);
            }
            
            .login-body {
                padding: 2rem;
                background: var(--card-bg);
            }
            
            .form-group {
                margin-bottom: 1.5rem;
            }
            
            .form-label {
                display: block;
                font-size: 0.9rem;
                font-weight: 500;
                color: var(--olive-bright);
                margin-bottom: 0.6rem;
                letter-spacing: 0.03em;
            }
            
            .form-input {
                width: 100%;
                padding: 1rem 1.2rem;
                border: 2px solid var(--border);
                border-radius: 10px;
                font-size: 1rem;
                transition: all 0.3s ease;
                background: var(--input-bg);
                color: var(--text-primary);
                font-family: inherit;
            }
            
            .form-input:focus {
                outline: none;
                border-color: var(--olive-light);
                box-shadow: 
                    0 0 0 3px rgba(132, 136, 113, 0.25),
                    0 0 15px rgba(132, 136, 113, 0.15);
                background: rgba(45, 50, 34, 0.95);
            }
            
            .form-input::placeholder {
                color: var(--text-secondary);
                font-weight: 300;
                opacity: 0.7;
            }
            
            .remember-forgot {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
                font-size: 0.9rem;
            }
            
            .remember-me {
                display: flex;
                align-items: center;
                gap: 0.6rem;
            }
            
            .remember-me input {
                width: 18px;
                height: 18px;
                accent-color: var(--olive-light);
                border-radius: 4px;
                background: var(--input-bg);
            }
            
            .forgot-password {
                color: var(--olive-bright);
                text-decoration: none;
                font-weight: 500;
                transition: all 0.2s ease;
                position: relative;
            }
            
            .forgot-password::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 0;
                height: 2px;
                background: var(--olive-bright);
                transition: width 0.3s ease;
            }
            
            .forgot-password:hover {
                color: var(--olive-light);
                text-shadow: 0 0 8px rgba(132, 136, 113, 0.4);
            }
            
            .forgot-password:hover::after {
                width: 100%;
            }
            
            .btn-login {
                width: 100%;
                padding: 1.1rem;
                background: linear-gradient(135deg, var(--olive-dark) 0%, var(--olive-light) 100%);
                color: var(--text-primary);
                border: none;
                border-radius: 10px;
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: var(--shadow);
                position: relative;
                overflow: hidden;
                letter-spacing: 0.02em;
            }
            
            .btn-login::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
                transition: left 0.6s;
            }
            
            .btn-login:hover {
                transform: translateY(-3px);
                box-shadow: 
                    var(--shadow-lg),
                    0 0 20px rgba(132, 136, 113, 0.25);
            }
            
            .btn-login:hover::before {
                left: 100%;
            }
            
            .btn-login:active {
                transform: translateY(-1px);
            }
            
            .error-message {
                background: rgba(209, 132, 132, 0.15);
                border: 1px solid rgba(209, 132, 132, 0.3);
                color: #f5caca;
                padding: 1rem 1.2rem;
                border-radius: 10px;
                font-size: 0.9rem;
                margin-bottom: 1.2rem;
                backdrop-filter: blur(8px);
            }
            
            .success-message {
                background: rgba(132, 176, 130, 0.15);
                border: 1px solid rgba(132, 176, 130, 0.3);
                color: #c5e1c3;
                padding: 1rem 1.2rem;
                border-radius: 10px;
                font-size: 0.9rem;
                margin-bottom: 1.2rem;
                backdrop-filter: blur(8px);
            }
            
            .divider {
                text-align: center;
                margin: 1.5rem 0;
                position: relative;
            }
            
            .divider::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                height: 1px;
                background: linear-gradient(90deg, transparent, var(--border), transparent);
            }
            
            .divider span {
                background: var(--card-bg);
                padding: 0 1.2rem;
                color: var(--text-secondary);
                font-size: 0.9rem;
                font-weight: 300;
            }
            
            .signup-link {
                text-align: center;
                margin-top: 1.5rem;
                font-size: 0.9rem;
                color: var(--text-secondary);
            }
            
            .signup-link a {
                color: var(--olive-bright);
                text-decoration: none;
                font-weight: 500;
                transition: all 0.2s ease;
                position: relative;
            }
            
            .signup-link a::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 0;
                height: 2px;
                background: var(--olive-bright);
                transition: width 0.3s ease;
            }
            
            .signup-link a:hover {
                color: var(--olive-light);
                text-shadow: 0 0 8px rgba(132, 136, 113, 0.4);
            }
            
            .signup-link a:hover::after {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            {{ $slot }}
        </div>
    </body>
</html>