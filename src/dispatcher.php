<?php
//=============================================================================
// Dispatcher script for ooless web apps.
// Author:  Pascal Hurni
// Date:    2022-08-27, 03-05-2014
//=============================================================================

//=============================================================================
// Decode the given route and return the bag augmented with:
//    handler        string  PHP file name that should handle this request (without php extension).
//    status_code    int     HTTP code to return if already determined.
function dispatch($bag)
{
    $matches = [];

    // If any match defines a 'view', it should use our one and only layout.
    $bag['layout'] = 'view/layout';
    
    //-----------------------------------------------------------------------------
    if (preg_match('/^\/?$/', $bag['route'])) {
        unset($bag['layout']);
        $bag['view'] = 'view/index';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/create$/', $bag['route'])) {
        $bag['view'] = 'view/exercises/create';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/create_exercise$/', $bag['route'])) {
        $bag['handler'] = 'controller/exercises/create_exercise';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises$/', $bag['route'])) {
        $bag['handler'] = 'controller/exercises/index';
    } 
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(.+?)$/', $bag['route'], $matches)) {
       
        $bag['handler'] = 'controller/exercises/delete';
       
        $bag['id_exercise'] = urldecode($matches[1]);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/[1-9]+\/edit$/', $bag['route'])) {
        $bag['handler'] = 'controller/exercises/edit';
    }
    else {
        $bag['status_code'] = 404;
    }

    return $bag;
}

//=============================================================================
// Return the URL for the given named route (the opposite of the dispatcher)
function route($name) {
    return '/'.$name;
}
