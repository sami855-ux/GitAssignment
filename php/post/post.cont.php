<?php
declare(strict_types = 1);

function is_input_empty(string $username, string $mainIdea, string $text):bool {
    if(empty($username) || empty($mainIdea) ||  empty($text)) {
            return true;
    } else {
        return false;
    }
}
function is_username_incorrect(object $pdo, string $username) {
    if(!get_username($pdo ,$username)) {
        return true;
    }
    else {
        return false;
    }
}

