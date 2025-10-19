<?php
return [
    'custom' => [
    'name' => [
        'required' => 'The track name is required.',
        'unique' => 'This track name is already taken.',
    ],
    'image' => [
        'image' => 'The file must be an image.',
        'mimes' => 'The image must be of type: jpeg, png, jpg, gif, svg.',
        'max' => 'The image size must not exceed 2MB.',
    ],
],

];