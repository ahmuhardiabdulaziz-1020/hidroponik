<div class="topbar">

    <div>
        🌱 Hidroponik System
    </div>

    <div style="display:flex;align-items:center;gap:15px">

        <div>
            <b>{{ auth()->user()->name ?? 'Guest' }}</b>
            <br>
            <small>
                {{ auth()->user()->userRole->nama_role ?? '' }}
            </small>
        </div>

        <div>
            🔔
        </div>

        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button style="
                background:white;
                color:#065f46;
                border:none;
                padding:8px 15px;
                border-radius:8px;
                cursor:pointer;
            ">
                Logout
            </button>
        </form>
        @endauth

    </div>

</div>
