<?php
return [
    'error' => [
        'error' => 'Error occurred.',
        'dbError' => 'Error occurred. Code: :code',
        'adminStatus' => 'You cannot change your own status.',
        'adminDestroy' => 'You cannot delete your own admin profile.',
        'slugUnique' => 'Failed to create a unique slug. Try to change the title.',
        'nameUnique' => 'Duplicate names. Try to change the title.',
        'notEmpty' => 'Unable to delete the category. Try to empty it first.',
    ],
    'success' => [
        'addCategory' => 'The feed has been successfully added.',
        'addFeed' => 'The feed has been successfully added.',
        'addNews' => 'The news has been successfully added.',
        'addSource' => 'New source has been added.',

        'deleteCategory' => 'The category has been deleted.',
        'deleteFeed' => 'The feed has been deleted.',
        'deleteNews' => 'The news has been deleted.',
        'deleteSource' => 'The source has been deleted.',
        'deleteUser' => 'User profile has been deleted.',

        'emptyCategory' => 'Category :category has been emptied.',
        'emptySource' => 'All news from :source have been deleted.',

        'updateNews' => 'The news has been successfully updated.',
        'updateUser' => 'User profile has been successfully updated.',
        'updateFeed' => 'The feed has been changed.',

        'status' => 'Status has been changed.',
        'parsed' => ':count source(s) have been parsed.',
        'queued' => ':count feeds were passed to the parser.',
    ],
];
