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
    elseif (preg_match('/^\/exercises\/\d+$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/exercises/delete';
        $bag['id_exercise'] = (int)filter_var($matches[0], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/\d+\/edit$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/exercises/edit';
        $bag['id_exercise'] = (int)filter_var($matches[0], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/answering+$/', $bag['route'])) {
        $bag['handler'] = 'controller/exercises/answering';
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/\d+\/fields\/\d+$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/fields/delete';

        preg_match_all('!\d+!', $matches[0], $numbers);

        $bag['id_exercise'] = (int)filter_var($numbers[0][0], FILTER_SANITIZE_NUMBER_INT);
        $bag['id_field'] = (int)filter_var($numbers[0][1], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(?P<exercise>\d+)\/fields\/(?P<field>\d+)\/edit$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/fields/edit';

        $bag['id_exercise'] = (int)filter_var($matches["exercise"], FILTER_SANITIZE_NUMBER_INT);
        $bag['id_field'] = (int)filter_var($matches["field"], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(?P<exercise>\d+)\/fields\/(?P<field>\d+)\/update$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/fields/edit';

        $bag['id_exercise'] = (int)filter_var($matches["exercise"], FILTER_SANITIZE_NUMBER_INT);

        $bag['id_field'] = (int)filter_var($matches["field"], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(?P<exercise>\d+)\/results$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/results/index';

        $bag['id_exercise'] = (int)filter_var($matches["exercise"], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------

    elseif (preg_match('/^\/exercises\/\d+\/fulfillments\/new$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/results/new';

        $bag['id_exercise'] = (int)filter_var($matches[0], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(?P<exercise>\d+)\/results\/(?P<question>\d+)$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/results/question';

        $bag['id_exercise'] = (int)filter_var($matches["exercise"], FILTER_SANITIZE_NUMBER_INT);
        $bag['id_question'] = (int)filter_var($matches["question"], FILTER_SANITIZE_NUMBER_INT);
    }
    //-----------------------------------------------------------------------------
    elseif (preg_match('/^\/exercises\/(?P<exercise>\d+)\/answers\/(?P<answer>\d+)$/', $bag['route'], $matches)) {
        $bag['handler'] = 'controller/results/answer';

        $bag['id_exercise'] = (int)filter_var($matches["exercise"], FILTER_SANITIZE_NUMBER_INT);
        $bag['id_answer'] = (int)filter_var($matches["answer"], FILTER_SANITIZE_NUMBER_INT);
    } else {
        $bag['status_code'] = 404;
    }

    return $bag;
}

//=============================================================================
// Return the URL for the given named route (the opposite of the dispatcher)
function route($name)
{
    return '/' . $name;
}
