<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 25/11/2017
 * Time: 14:34
 */

// flash.blade.php

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif