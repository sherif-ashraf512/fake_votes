function loginUser(email, password) {
  if (email === "noorrabie93@gmail.com" && password === '123456') {
    window.location.href = "Home.html"; // هنا المسار الصحيح للصفحة الرئيسية
    return true;
  } else {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'alert alert-warning mb-3';
    errorDiv.textContent = 'Email or Password is incorrect.';

    const form = document.querySelector('form');

    // تأكد إن مفيش رسالة خطأ مكررة
    const existingError = form.querySelector('.alert');
    if (existingError) existingError.remove();

    form.appendChild(errorDiv);

    return false;
  }
}
  
  // مثال على كيفية استخدام الدالة عند إرسال النموذج
  document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault(); // منع الإرسال التقليدي للنموذج
    
    const email = document.querySelector('input[name="email"]').value;
    const password = document.querySelector('input[name="password"]').value;
    
    loginUser(email, password);
  }); 
  // Toggle password visibility
  document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('exampleInputPassword1');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
  });

  // Forgot password functionality
  document.getElementById('forgotPassword').addEventListener('click', function() {
    // Add your forgot password logic here
    alert('Password reset link will be sent to your email.');
  }); 