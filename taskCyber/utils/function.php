
<?php

// fonciton pour hasher le mdp
    function passwordHash($mdp){
        $options = [
            'cost' => 8,
        ];

        return password_hash($mdp, PASSWORD_BCRYPT, $options);
        

    }

// verifier le mdp       ---------------------------EN COURS -----------------------------

    // function passwordOk($mdp_saisie){

    // $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

    // if (password_verify('rasmuslerdorf', $hash)) {
    //     echo 'Le mot de passe est valide !';
    // } else {
    //     echo 'Le mot de passe est invalide.';
    // }
    // }

?>