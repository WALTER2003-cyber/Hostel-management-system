<?php
include "../headers/config/init.php";
include "../headers/config/auth.php";
// $id = $_SESSION["userid"];
// $pick = "SELECT * FROM users WHERE uuid = '$id'";
// $row = $conn->query($pick);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login — Hostel Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#0F1729;
    --rail:#0A0E1D;
    --surface:#1A2240;
    --surface-soft:#161E38;
    --border:rgba(255,255,255,0.07);
    --text:#F3F5FB;
    --muted:#8B93B8;
    --amber:#F2A93B;
    --amber-soft:rgba(242,169,59,0.14);
    --teal:#3ECF8E;
    --teal-soft:rgba(62,207,142,0.14);
    --danger:#F2665B;
    --radius:14px;
    --gap:18px;
    --shadow: 0 10px 30px rgba(2,6,23,0.6);
    --card-width:980px;
    --form-width:420px;
  }

  *{box-sizing:border-box}
  html,body{height:100%;margin:0;font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;background:linear-gradient(180deg,var(--bg),var(--rail));color:var(--text);-webkit-font-smoothing:antialiased}
  a{color:inherit;text-decoration:none}
  button{font-family:inherit}

  .page{min-height:100vh;display:flex;align-items:center;justify-content:center;padding:32px}

  .card{
    width:100%;
    max-width:var(--card-width);
    display:grid;
    grid-template-columns:1fr 420px;
    gap:32px;
    align-items:center;
    background:linear-gradient(180deg,rgba(255,255,255,0.02),rgba(255,255,255,0.01));
    border-radius:20px;
    padding:28px;
    border:1px solid var(--border);
    box-shadow:var(--shadow);
  }

  /* Left hero column */
  .hero{padding:18px 12px}
  .brand{display:flex;align-items:center;gap:12px;margin-bottom:18px}
  .logo{width:56px;height:56px;border-radius:12px;background:linear-gradient(135deg,var(--amber),var(--teal));display:flex;align-items:center;justify-content:center;color:#071026;font-weight:800;font-size:20px}
  .hero h1{margin:0;font-size:28px;line-height:1.05}
  .hero p{margin-top:12px;color:var(--muted);font-size:15px;max-width:520px}

  /* Right form column */
  .forms{
    width:100%;
    max-width:var(--form-width);
    background:linear-gradient(180deg,var(--surface),var(--surface-soft));
    border-radius:14px;
    padding:20px;
    border:1px solid var(--border);
  }

  .form-title{font-size:18px;font-weight:700;margin-bottom:18px}

  form{display:flex;flex-direction:column;gap:12px}
  label{font-size:13px;color:var(--muted);display:block;margin-bottom:6px}
  input{
    width:100%;
    padding:12px 14px;
    border-radius:10px;
    border:1px solid var(--border);
    background:rgba(255,255,255,0.02);
    color:var(--text);
    font-size:14px;
    outline:none;
  }
  input::placeholder{color:rgba(255,255,255,0.25)}

  .actions{display:flex;align-items:center;justify-content:space-between;margin-top:6px}
  .btn{background:linear-gradient(90deg,var(--teal),var(--amber));color:#071026;border:none;padding:10px 14px;border-radius:10px;cursor:pointer;font-weight:700;box-shadow:0 8px 20px rgba(62,207,142,0.06)}
  .btn.ghost{background:transparent;color:var(--text);border:1px solid var(--border);font-weight:600}
  .muted{color:var(--muted);font-size:13px}
  .small{font-size:12px;color:var(--muted)}
  .helper{display:flex;align-items:center;gap:8px;color:var(--muted);font-size:13px;margin-top:6px}

  .socials{display:flex;gap:8px;margin-top:8px}
  .social{flex:1;padding:10px;border-radius:10px;border:1px solid var(--border);background:rgba(255,255,255,0.01);text-align:center;cursor:pointer;color:var(--muted)}

  .pw-wrap{position:relative}
  .pw-toggle{
    position:absolute;right:8px;top:50%;transform:translateY(-50%);
    background:transparent;border:none;color:var(--muted);cursor:pointer;font-weight:700;
    width:44px;height:32px;display:flex;align-items:center;justify-content:center;border-radius:8px;
  }

  @media(max-width:980px){
    .card{grid-template-columns:1fr;padding:18px}
    .forms{max-width:100%}
  }
</style>
</head>
<body>
<div class="page" role="main">
  <div class="card">
    <!-- Hero -->
    <div class="hero">
      <div class="brand">
        <div class="logo" aria-hidden="true">M</div>
        <div>
          <div style="font-weight:800">Mirac</div>
          <div class="small muted">Hostel management dashboard</div>
        </div>
      </div>
      <h1>Welcome</h1>
      <p>Sign in to manage student records, payments, and hostel assignments. New here? Create an account to get started.</p>
      <div style="margin-top:20px;display:flex;gap:12px;flex-wrap:wrap">
        <div style="background:linear-gradient(90deg,var(--teal),var(--amber));padding:10px 12px;border-radius:10px;color:#071026;font-weight:700">Secure</div>
        <div style="background:rgba(255,255,255,0.02);padding:10px 12px;border-radius:10px;color:var(--muted)">Accessible</div>
        <div style="background:rgba(255,255,255,0.02);padding:10px 12px;border-radius:10px;color:var(--muted)">Responsive</div>
      </div>
    </div>

    <!-- Login Form -->
    <div class="forms" role="region" aria-label="Login form">
      <div class="form-title">Login</div>

      <form action="../headers/config/auth.php" method="POST" id="loginForm" autocomplete="on" novalidate>
        <div>
          <label for="loginEmail"><strong>Email</strong></label>
          <input id="loginEmail" name="email" type="email" placeholder="you@example.com" required>
        </div>

        <div class="pw-wrap">
          <label for="loginPassword"><strong>Password</strong></label>
          <input id="loginPassword" name="password" type="password" placeholder="Enter your password" required>
          <button type="button" class="pw-toggle" aria-label="Toggle password" data-target="loginPassword">Show</button>
        </div>

        <div class="actions">
          <label class="helper"><input type="checkbox" id="remember" name="remember"> <span class="muted">Remember me</span></label>
          <a class="small muted" href="#" id="forgotLink">Forgot password</a>
        </div>

        <div style="display:flex;gap:10px;margin-top:8px">
          <button class="btn" type="submit">Login</button>
          <a href="signup.html" class="btn ghost">Create account</a>
        </div>

        <div class="small muted" style="margin-top:12px">Or continue with</div>
        <div class="socials">
          <div class="social">Google</div>
          <div class="social">Facebook</div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Password toggle
  document.querySelectorAll('.pw-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const target = document.getElementById(btn.dataset.target);
      if (!target) return;
      if (target.type === 'password') { target.type = 'text'; btn.textContent = 'Hide'; }
      else { target.type = 'password'; btn.textContent = 'Show'; }
    });
  });
</script>
</body>
</html>
