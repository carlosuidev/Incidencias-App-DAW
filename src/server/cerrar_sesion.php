<?php
try {
    session_start();
    session_destroy();
    echo "[{\"msg\": \"bien\"}]";
} catch (\Throwable $th) {
    echo "[{\"msg\": \"mal\"}]";
}
?>