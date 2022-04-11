<?php

namespace App\Traits;
use \Config\Database;

trait Search {

    public static function search($search = null) {
        $self = new static;

        if ($search) {
            foreach ($self->searchable as $column) {
                $self->orLike($column, $search);
            }
        }
        return $self;
        
    }
}