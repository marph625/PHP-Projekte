<?php

function notenschlüssel($note) {
    switch ($note) {
        # ohne '' klappt auch
        case 1:
            echo "Eine sehr gute Arbeit.\n";
            break;
        case '2':
            echo "Eine gute Arbeit.\n";
            break;
        case 3:
            echo "Eine befriedigende Arbeit.\n";
            break;
        case '4':
            echo "Eine ausreichende Arbeit.\n";
            break;
        case 5:
            echo "Eine mangelhafte Arbeit.\n";
            break;
        case '6':
            echo "Eine ungenügende Arbeit.\n";
            break;
        default:
            echo "Diese Note gibt es nicht.\n";
    }
}

notenschlüssel(1);
notenschlüssel(2);
notenschlüssel(3);
notenschlüssel(4);
notenschlüssel(5);
notenschlüssel(6);