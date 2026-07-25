<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Sign Up — Hostel Dashboard</title>
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

  .btn{background:linear-gradient(90deg,var(--teal),var(--amber));color:#071026;border:none;padding:10px 14px;border-radius:10px;cursor:pointer;font-weight:700;box-shadow:0 8px 20px rgba(62,207,142,0.06)}
  .btn.ghost{background:transparent;color:var(--text);border:1px solid var(--border);font-weight:600}
  .muted{color:var(--muted);font-size:13px}
  .small{font-size:12px;color:var(--muted)}

  .pw-wrap{position:relative}
  .pw-toggle{
    position:absolute;right:8px;top:50%;transform:translateY(-50%);
    background:transparent;border:none;color:var(--muted);cursor:pointer;font-weight:700;
    width:44px;height:32px;display:flex;align-items:center;justify-content:center;border-radius:8px;
  }

  /* name split layout */
  .name-row{display:flex;gap:8px}
  .name-row .field{flex:1;min-width:0}

  @media(max-width:980px){
    .card{grid-template-columns:1fr;padding:18px}
    .forms{max-width:100%}
    .name-row{flex-direction:column}
  }
</style>
</head>
<body>
<div class="page" role="main">
  <div class="card">
    <!-- Hero -->
    <div class="hero">
      <div class="brand">
        <div class="logo" aria-hidden="true"><?=$row['']?></div>
        <div>
          <div style="font-weight:800"><?=$row['hostel name']?></div>
          <div class="small muted">Hostel management dashboard</div>
        </div>
      </div>
      <h1>Create your account</h1>
      <p>Join the hostel management dashboard to manage student records, payments, and hostel assignments with ease.</p>
      <div style="margin-top:20px;display:flex;gap:12px;flex-wrap:wrap">
        <div style="background:linear-gradient(90deg,var(--teal),var(--amber));padding:10px 12px;border-radius:10px;color:#071026;font-weight:700">Secure</div>
        <div style="background:rgba(255,255,255,0.02);padding:10px 12px;border-radius:10px;color:var(--muted)">Accessible</div>
        <div style="background:rgba(255,255,255,0.02);padding:10px 12px;border-radius:10px;color:var(--muted)">Responsive</div>
      </div>
    </div>

    <!-- Signup Form -->
    <div class="forms" role="region" aria-label="Sign up form">
      <div class="form-title">Sign Up</div>

      <form method="POST" action="../headers/config/capture.php" id="signupForm" autocomplete="on"">
        <div class="name-row" aria-label="Name fields">
          <div class="field">
            <label for="firstName"><strong>First name</strong></label>
            <input id="firstName" name="firstName" type="text" placeholder="Jane" required>
          </div>
          <div class="field">
            <label for="middleName"><strong>Middle name</strong></label>
            <input id="middleName" name="middleName" type="text" placeholder="Optional">
          </div>
          <div class="field">
            <label for="lastName"><strong>Last name</strong></label>
            <input id="lastName" name="lastName" type="text" placeholder="Doe" required>
          </div>
        </div>

        <div>
          <label for="signupEmail"><strong>Email</strong></label>
          <input id="signupEmail" name="email" type="email" placeholder="you@example.com" required>
        </div>

        <div class="pw-wrap">
          <label for="signupPassword"><strong>Password</strong></label>
          <input id="signupPassword" name="password" type="password" placeholder="Create a password" required>
          <button type="button" class="pw-toggle" aria-label="Toggle password" data-target="signupPassword">Show</button>
        </div>

        <div class="pw-wrap">
          <label for="confirmPassword"><strong>Confirm password</strong></label>
          <input id="confirmPassword" name="confirm" type="password" placeholder="Confirm password" required>
          <button type="button" class="pw-toggle" aria-label="Toggle password" data-target="confirmPassword">Show</button>
        </div>

        <div style="display:flex;gap:10px;margin-top:6px">
          <button class="btn" type="submit">Create account</button>
          <a href="login.php" class="btn ghost">Back to login</a>
        </div>

        <div class="small muted" style="margin-top:12px">By creating an account you agree to our <span style="color:var(--teal)">Terms</span> and <span style="color:var(--teal)">Privacy</span>.</div>
      </form>
    </div>
  </div>
</div>

<script>
  // Password toggles
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
