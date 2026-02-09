<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Custom Styles -->
        <style>
            :root {
                --primary: #4f46e5;
                --primary-light: #818cf8;
                --secondary: #f3f4f6;
                --text-primary: #1f2937;
                --text-secondary: #6b7280;
                --border: #e5e7eb;
                --success: #10b981;
                --error: #ef4444;
                --white: #ffffff;
                --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
            }
            
            .login-container {
                width: 100%;
                max-width: 420px;
                background: var(--white);
                border-radius: 16px;
                box-shadow: var(--shadow-lg);
                overflow: hidden;
                animation: fadeIn 0.5s ease-out;
            }
            
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .login-header {
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
                padding: 2.5rem 2rem;
                text-align: center;
                color: var(--white);
            }
            
            .login-header h1 {
                font-size: 1.875rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                letter-spacing: -0.025em;
            }
            
            .login-header p {
                font-size: 1rem;
                opacity: 0.9;
                font-weight: 300;
            }
            
            .login-body {
                padding: 2rem;
            }
            
            .form-group {
                margin-bottom: 1.5rem;
            }
            
            .form-label {
                display: block;
                font-size: 0.875rem;
                font-weight: 500;
                color: var(--text-primary);
                margin-bottom: 0.5rem;
            }
            
            .form-input {
                width: 100%;
                padding: 0.875rem 1rem;
                border: 2px solid var(--border);
                border-radius: 8px;
                font-size: 1rem;
                transition: all 0.2s ease;
                background: var(--white);
            }
            
            .form-input:focus {
                outline: none;
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            }
            
            .form-input::placeholder {
                color: var(--text-secondary);
            }
            
            .remember-forgot {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
                font-size: 0.875rem;
            }
            
            .remember-me {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .remember-me input {
                width: 16px;
                height: 16px;
                accent-color: var(--primary);
            }
            
            .forgot-password {
                color: var(--primary);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s ease;
            }
            
            .forgot-password:hover {
                color: var(--primary-light);
            }
            
            .btn-login {
                width: 100%;
                padding: 1rem;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
                color: var(--white);
                border: none;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s ease;
                box-shadow: var(--shadow);
            }
            
            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-lg);
            }
            
            .btn-login:active {
                transform: translateY(0);
            }
            
            .error-message {
                background: #fee2e2;
                border: 1px solid #fecaca;
                color: var(--error);
                padding: 0.75rem 1rem;
                border-radius: 8px;
                font-size: 0.875rem;
                margin-bottom: 1rem;
            }
            
            .success-message {
                background: #dcfce7;
                border: 1px solid #bbf7d0;
                color: var(--success);
                padding: 0.75rem 1rem;
                border-radius: 8px;
                font-size: 0.875rem;
                margin-bottom: 1rem;
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
                background: var(--border);
            }
            
            .divider span {
                background: var(--white);
                padding: 0 1rem;
                color: var(--text-secondary);
                font-size: 0.875rem;
            }
            
            .signup-link {
                text-align: center;
                margin-top: 1.5rem;
                font-size: 0.875rem;
                color: var(--text-secondary);
            }
            
            .signup-link a {
                color: var(--primary);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s ease;
            }
            
            .signup-link a:hover {
                color: var(--primary-light);
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            {{ $slot }}
        </div>
    </body>
</html>