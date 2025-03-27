<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>SMARORDERAI</title>
</head>

<body>
    <nav class="navbar">
        <a href="/">        <h3 class="navbar__logo">SMARORDERAI</h3></a>
        <button class="navbar__button" id="themeToggler"><i class='bx bx-sun'></i></button>
    </nav>

    <header class="header">
        <div class="header__title">
            <h1>Hello, There!</h1>
            <h2>How can I help you today?</h2>
        </div>
        <div class="suggests">
            <div class="suggests__item">
                <p class="suggests__item-text">
                   Je veux commander des produits 
                </p>
                <div class="suggests__item-icon">
                    <i class='bx bx-stopwatch'></i>
                </div>
            </div>
            <div class="suggests__item">
                <p class="suggests__item-text">
                    Je veux Réserver
                </p>
                <div class="suggests__item-icon">
                    <i class='bx bx-edit-alt'></i>
                </div>
            </div>
            <div class="suggests__item">
                <p class="suggests__item-text">
                    Afficher les produits
                </p>
                <div class="suggests__item-icon">
                    <i class='bx bx-compass'></i>
                </div>
            </div>
            
        </div>
    </header>

    <section class="chats"></section>

    <section class="prompt">
        <form action="#" class="prompt__form" novalidate method="post">
            <div class="prompt__input-wrapper">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="text" placeholder="Enter a prompt here" class="prompt__form-input" required>
                <button class="prompt__form-button" id="sendButton">
                    <i class='bx bx-send'></i>
                </button>
                <button class="prompt__form-button" id="deleteButton">
                    <i class='bx bx-trash'></i>
                </button>
            </div>
        </form>
        <p class="prompt__disclaim">
        SMARORDERAI may display inaccurate info, including about people, so double-check its responses.
        </p>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="{{ asset('js/scriptR.js') }}"></script>
</body>

</html>