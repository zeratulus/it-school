<?php

function is_prime(int $n): bool {
    for ($i = $n ** .5 | 1; $i && $n % $i--;);
    return !$i && $n > 1;
}

function is_prime_gmp(int $n): bool {
    switch (gmp_prob_prime($n)) {
        case 0: return false;
        default: return true;
    }
}

function is_prime_heavy($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i < $n / 2; $i++) {
        if ($n % $i == 0 ) return false;
    }
    return true;
}

//