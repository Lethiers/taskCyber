
<?php

// fonciton pour hasher le mdp
    function passwordHash($mdp){
        $options = [
            'cost' => 8,
        ];
        return password_hash($mdp, PASSWORD_BCRYPT, $options);
    }

?>