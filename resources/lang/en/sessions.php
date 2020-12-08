<?php
return [
    'error' => [
        'error' => 'Error occurred.',
        'dbError' => 'Error occurred. Code: :code',
        'adminStatus' => 'You cannot change your own status.',
        'adminDestroy' => 'You cannot delete your own admin profile.',
        'slugUnique' => 'Failed to create a unique slug. Try to change the title.',
        'notEmpty' => 'Unable to delete the category. Try to empty it first.',
    ],
    'success' => [
        'addNews' => 'The news has been successfully added.',
        'addFeed' => 'The feed has been successfully added.',
        'addCategory' => 'The feed has been successfully added.',

        'updateNews' => 'The news has been successfully updated.',
        'updateUser' => 'User profile has been successfully updated.',
        'updateFeed' => 'The feed has been changed.',

        'deleteNews' => 'The news has been deleted.',
        'deleteUser' => 'User profile has been deleted.',
        'deleteFeed' => 'The feed has been deleted.',
        'deleteCategory' => 'The category has been deleted.',
        'emptyCategory' => 'Category :category has been emptied.',

        'status' => 'Status has been changed.',
        'parsed' => ':count source(s) have been parsed.',
        'queued' => ':count tasks were passed to the parser.',
    ],
];
