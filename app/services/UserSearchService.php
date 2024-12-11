<?php

namespace App\Services;

use App\Models\User;

class UserSearchService
{
    public function searchUsers($search = null)
    {
        return User::when($search, function ($query, $search) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(lastname) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(email) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(gender) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(address) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(phone) LIKE ?', ['%' . strtolower($search) . '%'])
            ->orWhereRaw('LOWER(password) LIKE ?', ['%' . strtolower($search) . '%']);
        })->with('country')->paginate(5);
    }
}
