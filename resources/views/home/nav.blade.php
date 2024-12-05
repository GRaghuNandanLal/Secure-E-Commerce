<nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="/">
                    <h3>Mysqlproject</h3>

            </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                      
                    
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="/problem">Challenges</a>
                        </li> -->
                     
                        
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/progress">Progress</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/rank">LeadersBoard</a>
                        </li>
                    </ul>


                    <div class="ms-4">
                        <a href="/profile" class="btn custom-btn custom-border-btn">Profile</a>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>