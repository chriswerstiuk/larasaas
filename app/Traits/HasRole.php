<?php

namespace App\Traits;

use App\Models\Role;

trait HasRole
{
	/**
     * The roles that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	/**
     * Check the is associate with the user.
     *
     * @return boolean
     */
	public function hasRole($role)
	{
		return $this->roles->contains('slug', $role);
	}
}
