<nav class="navbar is-transparent">
    
    <div class="container">
    
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
        {{-- <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" > --}}
        <strong>BLOG LARAVEL</strong>
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
    
    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="https://bulma.io/">
                Home
            </a>
        </div>
    
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                <p class="control">
                    <a class="bd-tw-button button" target="_blank" href="https://github.com/LuquinhasMoraes">
                    <span class="icon">
                        <i class="fab fa-github"></i>
                    </span>
                    <span>
                        Code
                    </span>
                    </a>
                </p>
                <p class="control">
                    <a class="button is-primary" href="{{ route('posts.create') }}">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Nova Postagem</span>
                    </a>
                </p>
                </div>
            </div>
        </div>   
    </div>

    </div>  
</nav>