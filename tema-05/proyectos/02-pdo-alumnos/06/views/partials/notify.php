<?php
    // La notificación se muestra en la vista  en caso de existir
    if (isset($notificacion)) :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>MENSAJE</strong> <?=$notificacion?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>    
<?php endif; unset($notificacion)?>