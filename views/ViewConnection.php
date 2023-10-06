<?php $titre = "Connexion"; ?>
<link rel="stylesheet" href="./style/style_connection.css">
</head>

<body>
    <header>
    </header>
    <div id="connection_container">
        <div id="connection">
            <img src="././asset/img/logo.png" alt="logo">
            <h1>Connexion au Dashboard</h1>
            <form action="<?= "?action=validConnection" ?>" method="post">
                <input type="email" name="email" id="email" placeholder="Email *">
                <input type="password" name="password" id="username" placeholder="Mot de passe *">
                <input type="submit" value="Connexion">
            </form>
        </div>
    </div>