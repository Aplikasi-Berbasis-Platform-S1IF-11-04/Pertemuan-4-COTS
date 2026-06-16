<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | HansInventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        
        .btn-glass {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-glass:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        
        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .input-group-text {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px 0 0 12px;
            border-right: none;
        }
        
        .animate-fade-in {
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center animate-fade-in">
            <div class="col-md-6">
                <div class="glass-card p-4">
                    <div class="text-center mb-4">
                        <i class="fas fa-user-plus fa-3x text-white mb-3"></i>
                        <h2 class="text-white fw-bold">Create Account</h2>
                        <p class="text-white-50">Register to get started</p>
                    </div>
                    
                    <?php if(session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <small><?= $error ?></small><br>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="/register" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label text-white">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="full_name" class="form-control" value="<?= old('full_name') ?>" placeholder="Enter full name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                <input type="text" name="username" class="form-control" value="<?= old('username') ?>" placeholder="Choose username" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Enter email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Create password" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-glass w-100 text-white">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </button>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="text-white-50">Already have an account? <a href="/login" class="text-white fw-bold">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>