<div style="
background:white;
padding:15px;
margin-bottom:20px;
border-radius:10px;
display:flex;
justify-content:space-between;
align-items:center;
">

<div>

Selamat datang

<b>
{{ auth()->user()->name }}
</b>

|

Role:

<b>
{{ auth()->user()->userRole->nama_role ?? '-' }}
</b>

</div>


<div>

<form method="POST" action="{{ route('logout') }}">

@csrf

<button type="submit"
style="
background:#dc2626;
color:white;
border:none;
padding:8px 15px;
border-radius:6px;
cursor:pointer;
">

Logout

</button>

</form>

</div>


</div>