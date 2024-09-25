<?php

function titleBar($title, $targetModal = "")
{
    global $titleButton, $titleIcon, $titleText;
    if ($titleButton) {
        echo '
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">' . $title . '</h1>
                <a data-toggle="modal" data-target="#' . $targetModal . '" id="' . $targetModal . '-id" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-' . $titleIcon . ' fa-sm text-white-50"></i> ' . $titleText . '</a>
            </div>
    ';
    } else {
        echo '
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">' . $title . '</h1>
            </div>
        ';
    }
}
